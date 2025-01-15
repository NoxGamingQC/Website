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
                
                $apiResponse = $client->getLocationsApi()->listLocations();
        
            if ($apiResponse->isSuccess()) {
                $result = $apiResponse->getResult();
                foreach ($result->getLocations() as $location) {
                    printf(
                        "%s: %s,<p/>", 
                        $location->getId(),
                        $location->getName()
                        //$location->getAddress()->getAddressLine1(),
                        //$location->getAddress()->getLocality()
                    );
                }
        
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
            }
        
        } catch (ApiException $e) {
            echo "ApiException occurred: <b/>";
            echo $e->getMessage() . "<p/>";
        }

        if($user) {
            return view('view.pos.menu')->with([
                'name' => $user->name,
                'image' => $user->image
            ]);
        }
        abort(404);
    }
}