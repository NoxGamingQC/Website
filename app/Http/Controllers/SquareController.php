<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use Carbon\Carbon;
use Square\Environment;
use Square\SquareClient;
use Illuminate\Http\Request;
use Square\Exceptions\ApiException;
use App\Http\Controllers\Controller;

class SquareController extends Controller
{
    public function getAccess() {
        $client = new SquareClient([
            'accessToken' => env('SQUARE_ACCESS_TOKEN'),
            'environment' => env('SQUARE_ENV') == "production" ? Environment::PRODUCTION : Environment::SANDBOX,
        ]);
        
        try {
        
            $apiResponse = $client->getLocationsApi()->listLocations();
        
            if ($apiResponse->isSuccess()) {
                return $client;
            } else {
                $errors = $apiResponse->getErrors();
                foreach ($errors as $error) {
                    printf(
                        "%s<br/> %s<br/> %s<p/>", 
                        $error->getCategory(),
                        $error->getCode(),
                        $error->getDetail()
                    );
                }
                abort(500);
            }
        
        } catch (ApiException $e) {
            echo "ApiException occurred: <b/>";
            echo $e->getMessage() . "<p/>";
            abort(500);
        }
    }

    public function index() {
        $squareClient = $this->getAccess();
        $catalogItems = $squareClient->getCatalogApi()->listCatalog(null, 'ITEM')->getResult()->getObjects();
        $catalog = [];
        foreach ($catalogItems as $key => $item) {
            if(is_array($item->getPresentAtLocationIds())) {
                if(in_array(env('SQUARE_LOCATION_ID'), $item->getPresentAtLocationIds())) {
                    array_push($catalog, [
                        'name' => $item->getItemData()->getName(),
                        'description' => $item->getItemData()->getDescription(),
                        'categoryID' => $item->getItemData()->getCategoryId(),
                        'imageIDs' => $item->getItemData()->getImageIds(),
                        'variationsNumber' => count($item->getItemData()->getVariations())
                    ]);
                }
            }   
        }
        dd($catalog);
    }
}