<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\API\ApiKey;
use Square\SquareClient;
use Square\SquareClientBuilder;
use Square\Authentication\BearerAuthCredentialsBuilder;
use Square\Environment;
use Square\Exceptions\ApiException;
use Carbon\Carbon;

class POSController extends Controller
{
    public function menu($slug)
    {
        $user = ApiKey::where('key', $slug)->first();
        $client = SquareClientBuilder::init()
        ->bearerAuthCredentials(
            BearerAuthCredentialsBuilder::init(
                $user->square_access_token
            )
        )
            ->environment(Environment::PRODUCTION)
            ->build();
            
            try {
                
                $catalogApi = $client->getCatalogApi();
                $locationsApi = $client->getLocationsApi();
                $invoiceApi = $client->getInvoicesApi();
                $apiResponse = $catalogApi->listCatalog(null, 'ITEM');
                $apiImagesResponse = $catalogApi->listCatalog(null, 'IMAGE');
                
                if ($apiResponse->isSuccess()) {
                    $catalog = $apiResponse->getResult();
                    $invoiceApiResponse = $invoiceApi->listInvoices($locationsApi->listLocations()->getResult()->getLocations()[0]->getID())->getResult()->getInvoices();
                $catalogImages = $apiImagesResponse->getResult();
            } else {
                $errors = $apiResponse->getErrors();
            }
        
        } catch (ApiException $e) {
            echo "ApiException occurred: <b/>";
            echo $e->getMessage() . "<p/>";
        }
        if($user) {
            return view('view.pos.menu')->with([
                'name' => $user->name,
                'image' => $user->image,
                'catalog' => $catalog->getObjects(),
                'catalogImages' => $catalogImages->getObjects(),
                'invoices' => $invoiceApiResponse,
            ]);
        }
        abort(404);
    }
}