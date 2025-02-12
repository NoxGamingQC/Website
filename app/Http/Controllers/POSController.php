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
use App\Model\PosCodes;

class POSController extends Controller
{
    public function index($slug) {
        return redirect('https://www.noxgamingqc.ca/pos/'. $slug .'/maintenance');
    }

    public function lock($slug) {
        $user = ApiKey::where('key', $slug)->first();
        return view('view.pos.lock')->with([
            'id' => $user->id,
            'name' => $user->name,
            'image' => $user->image,
            'slug' => $slug,
            'phone_number' => $user->phone_number,
            'address'=>$user->address
        ]);
    }

    public function validateCashier($pos, $pin) {
        $cashier = PosCodes::where('pin', '=', $pin)->where('pos', '=', $pos)->first();
        if(!isset($cashier)) {
            $cashier = PosCodes::where('pin', '=', $pin)->where('pos', '=', 'all')->first();
        }
        if($cashier) {
            return response()->json([
                'id' => $cashier->id,
            ]);
        }
        abort(403);
    }

    public function menu($slug, $cashierID)
    {
        $cashier = PosCodes::find($cashierID);
        if($cashier) {
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
                        $catalog = [];
                        $catalogAPI = $apiResponse->getResult()->getObjects();
                        $invoiceApiResponse = $invoiceApi->listInvoices($user->square_location_id)->getResult()->getInvoices();
                    $catalogImages = $apiImagesResponse->getResult();
                    foreach($catalogAPI as $item) {
                        foreach($item->getPresentAtLocationIds() as $location) {
                            if($location == $user->square_location_id) {
                                array_push($catalog, $item);
                            }
                        }
                    }
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
                    'phone_number'=>$user->phone_number,
                    'catalog' => $catalog,
                    'catalogImages' => $catalogImages->getObjects(),
                    'invoices' => $invoiceApiResponse,
                    'cashierName' => isset($cashier->lastname) ? ($cashier->firstname . ' ' . $cashier->lastname[0] . '.') : $cashier->firstname
                ]);
            }
        }
        return redirect('/pos/' . $slug . '/');
    }
}