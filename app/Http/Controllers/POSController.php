<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\API\ApiKey;
use Square\SquareClient;
use Square\SquareClientBuilder;
use Square\Authentication\BearerAuthCredentialsBuilder;
use Square\Models\Builders\BatchRetrieveInventoryCountsRequestBuilder;
use Square\Environment;
use Square\Exceptions\ApiException;
use Carbon\Carbon;
use App\Model\PosCodes;

class POSController extends Controller
{
    public function index($slug) {
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

    public function validateCashier($pos, $pin, $option) {
        $cashier = PosCodes::where('pin', '=', $pin)->where('pos', '=', $pos)->first();
        if(!isset($cashier)) {
            $cashier = PosCodes::where('pin', '=', $pin)->where('pos', '=', 'all')->first();
        }
        if($cashier) {
            if(in_array($option, explode(';', $cashier->access)) || $cashier->access == 'all') {
                return response()->json([
                    'id' => $cashier->id,
                    'name' => isset($cashier->lastname) ? ($cashier->firstname . ' ' . $cashier->lastname[0] . '.') : $cashier->firstname,
                ]);
            } else {
                abort(403, 'access_denied');
            }
        }
        abort(403, 'pin_error');
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
                    'slug' => $slug,
                    'catalog' => $catalog,
                    'catalogImages' => $catalogImages->getObjects(),
                    'invoices' => $invoiceApiResponse,
                    'cashierName' => isset($cashier->lastname) ? ($cashier->firstname . ' ' . $cashier->lastname[0] . '.') : $cashier->firstname
                ]);
            }
        }
        return redirect('/pos/' . $slug . '/');
    }
    public function getInventoryCount($slug, $itemID) {
        $user = ApiKey::where('key', $slug)->first();
            $client = SquareClientBuilder::init()
            ->bearerAuthCredentials(
                BearerAuthCredentialsBuilder::init(
                    $user->square_access_token
                )
            )
                ->environment(Environment::PRODUCTION)
                ->build();
        $inventoryApi = $client->getInventoryApi();
        $locationID = $user->square_location_id;
        $itemID = '2W4MWURUXXHM2VSMUHOFATLC';
        $body = BatchRetrieveInventoryCountsRequestBuilder::init()
            ->catalogObjectIds(
                [
                    $itemID
                ]
            )
            ->locationIds(
                [
                    $locationID
                ]
            )
    ->build();

    $apiResponse = $inventoryApi->batchRetrieveInventoryCounts($body);

    if ($apiResponse->isSuccess()) {
        return response()->json($apiResponse->getResult()->getCounts()[0]->getQuantity());
    } else {
        $errors = $apiResponse->getErrors();
    }

    // Getting more response information
    var_dump($apiResponse->getStatusCode());
    var_dump($apiResponse->getHeaders());
    }
}