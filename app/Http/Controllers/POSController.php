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
                $apiResponse = $catalogApi->listCatalog(null, 'ITEM');
                $apiImagesResponse = $catalogApi->listCatalog(null, 'IMAGE');

            if ($apiResponse->isSuccess()) {
                $catalog = $apiResponse->getResult();
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
                'catalogImages' => $catalogImages->getObjects()
            ]);
        }
        abort(404);
    }
}