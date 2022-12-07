<?php

namespace App;

use Square\Environment;
use Square\SquareClient;
use Illuminate\Database\Eloquent\Model;

class Square extends Model
{
    public static function getAccess() {
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

    public static function getCategories($squareClient) {
        $catalogCategories = $squareClient->getCatalogApi()->listCatalog(null, 'CATEGORY')->getResult()->getObjects();
        foreach($catalogCategories as $key => $categorie) {
            $categories[$categorie->getId()] = [
                'id' => $categorie->getId(),
                'name' => $categorie->getCategoryData()->getName()
            ];
        }
        return $categories;
    }

    public static function getAvailableCategories($squareClient) {
        $items = Square::getItems($squareClient);
        $catalogCategories = Square::getCategories($squareClient);
        $categories = [];

        foreach($catalogCategories as $key => $category) {
            foreach($items as $key => $item) {
                if($category['name'] === $item['category']) {
                    $categories[$category['id']] = $category;
                }
            }
        }
        return $categories;
    }

    public static function getImages($squareClient) {
        $catalogImages = $squareClient->getCatalogApi()->listCatalog(null, 'IMAGE')->getResult()->getObjects();

        foreach($catalogImages as $key => $image) {
            $images[$image->getId()] = [
                'id' => $image->getId(),
                'name' => $image->getimageData()->getName(),
                'url' => $image->getimageData()->getUrl()
            ];
        }
        return $images;
    }

    public static function getItems($squareClient) {
        $catalog = [];
        $catalogItems = $squareClient->getCatalogApi()->listCatalog(null, 'ITEM')->getResult()->getObjects();
        $measurementUnits = $squareClient->getCatalogApi()->listCatalog(null, 'MEASUREMENT_UNIT')->getResult()->getObjects();
        $categories = Square::getCategories($squareClient);
        $images = Square::getImages($squareClient);
        foreach ($catalogItems as $key => $item) {
            $isAvailable = false;
            $isSamePrice = true;
            $lastPrice = null;
            $price = null;
            if(is_array($item->getPresentAtLocationIds())) {
                if(in_array(env('SQUARE_LOCATION_ID'), $item->getPresentAtLocationIds())) {
                    foreach($item->getItemData()->getVariations() as $key => $variation) {
                        $priceUnit = null;
                        if($item->getItemData()->getName() == 'Déneigement entrée') {
                            foreach($measurementUnits as $key => $measurementUnit) {
                                if($variation->getItemVariationData()->getMeasurementUnitId() === $measurementUnit->getId()) {
                                    if($measurementUnit->getMeasurementUnitData()->getMeasurementUnit()->getTimeUnit()) {
                                        if($measurementUnit->getMeasurementUnitData()->getMeasurementUnit()->getTimeUnit() === 'GENERIC_HOUR') {
                                            $priceUnit = '/h';
                                        }
                                    }
                                    if($measurementUnit->getMeasurementUnitData()->getMeasurementUnit()->getTimeUnit()) {
                                        if($measurementUnit->getMeasurementUnitData()->getMeasurementUnit()->getTimeUnit() === 'METRIC_KILOMETER') {
                                            $priceUnit = '/km';
                                        }
                                    }
                                }
                            }
                        }
                        if($variation->getItemVariationData()->getPricingType() === 'VARIABLE_PRICING') {
                            $price = 'variable';
                        }
                        if($variation->getItemVariationData()->getPriceMoney()) {
                            $price = $variation->getItemVariationData()->getPriceMoney()->getAmount();
                            if($lastPrice == null) {
                                $lastPrice = $price;
                            } else if($lastPrice !== $price) {
                                $isSamePrice = false;
                            }
                        }
                        if(!$variation->getItemVariationData()->getLocationOverrides()) {
                            $isAvailable = true;
                        } else {
                            foreach($variation->getItemVariationData()->getLocationOverrides() as $key => $location) {
                                if(env('SQUARE_LOCATION_ID') === $location->getLocationId()) {
                                    if($location->getSoldOut() !== true) {
                                        $isAvailable = true;
                                    }
                                }
                            }
                        }
                    }
                    if($item->getItemData()->getImageIds()) {
                        $itemImage = $item->getItemData()->getImageIds()[0] ? $images[$item->getItemData()->getImageIds()[0]]['url'] : null;
                    } else {
                        $itemImage = null;
                    }

                    array_push($catalog, [
                        'id' => $item->getId(),
                        'name' => $item->getItemData()->getName(),
                        'description' => $item->getItemData()->getDescription(),
                        'category' => $item->getItemData()->getCategoryId() ? $categories[$item->getItemData()->getCategoryId()]['name'] : null,
                        'imageURL' => $itemImage,
                        'variationsCount' => count($item->getItemData()->getVariations()),
                        'variations' => $item->getItemData()->getVariations(),
                        'price' => $price,
                        'priceUnit' => isset($priceUnit) ? $priceUnit : null,
                        'isAvailable' => $isAvailable,
                        'isSamePrice' => $isSamePrice
                    ]);
                }
            }   
        }
        return $catalog;
    }

    public static function getItem($squareClient, $itemID) {
        $catalogItems = $squareClient->getCatalogApi()->listCatalog(null, 'ITEM')->getResult()->getObjects();
        $measurementUnits = $squareClient->getCatalogApi()->listCatalog(null, 'MEASUREMENT_UNIT')->getResult()->getObjects();
        $categories = Square::getCategories($squareClient);
        $images = Square::getImages($squareClient);
        foreach ($catalogItems as $key => $item) {
            $isAvailable = false;
            $isSamePrice = true;
            $lastPrice = null;
            $price = null;
            if(is_array($item->getPresentAtLocationIds())) {
                if(in_array(env('SQUARE_LOCATION_ID'), $item->getPresentAtLocationIds())) {
                    foreach($item->getItemData()->getVariations() as $key => $variation) {
                        if($item->getId() === $itemID) {
                            $priceUnit = null;
                            if($item->getItemData()->getName() == 'Déneigement entrée') {
                                foreach($measurementUnits as $key => $measurementUnit) {
                                    if($variation->getItemVariationData()->getMeasurementUnitId() === $measurementUnit->getId()) {
                                        if($measurementUnit->getMeasurementUnitData()->getMeasurementUnit()->getTimeUnit()) {
                                            if($measurementUnit->getMeasurementUnitData()->getMeasurementUnit()->getTimeUnit() === 'GENERIC_HOUR') {
                                                $priceUnit = '/h';
                                            }
                                        }
                                        if($measurementUnit->getMeasurementUnitData()->getMeasurementUnit()->getTimeUnit()) {
                                            if($measurementUnit->getMeasurementUnitData()->getMeasurementUnit()->getTimeUnit() === 'METRIC_KILOMETER') {
                                                $priceUnit = '/km';
                                            }
                                        }
                                    }
                                }
                            }
                            if($variation->getItemVariationData()->getPricingType() === 'VARIABLE_PRICING') {
                                $price = 'variable';
                            }
                            if($variation->getItemVariationData()->getPriceMoney()) {
                                $price = $variation->getItemVariationData()->getPriceMoney()->getAmount();
                                if($lastPrice == null) {
                                    $lastPrice = $price;
                                } else if($lastPrice !== $price) {
                                    $isSamePrice = false;
                                }
                            }
                            if(!$variation->getItemVariationData()->getLocationOverrides()) {
                                $isAvailable = true;
                            } else {
                                foreach($variation->getItemVariationData()->getLocationOverrides() as $key => $location) {
                                    if(env('SQUARE_LOCATION_ID') === $location->getLocationId()) {
                                        if($location->getSoldOut() !== true) {
                                            $isAvailable = true;
                                        }
                                    }
                                }
                            }
                            if($item->getItemData()->getImageIds()) {
                                $itemImage = $item->getItemData()->getImageIds()[0] ? $images[$item->getItemData()->getImageIds()[0]]['url'] : null;
                            } else {
                                $itemImage = null;
                            }

                            $requestedItem = [
                                'id' => $item->getId(),
                                'name' => $item->getItemData()->getName(),
                                'description' => $item->getItemData()->getDescription(),
                                'category' => $item->getItemData()->getCategoryId() ? $categories[$item->getItemData()->getCategoryId()]['name'] : null,
                                'imageURL' => $itemImage,
                                'variationsCount' => count($item->getItemData()->getVariations()),
                                'variations' => $item->getItemData()->getVariations(),
                                'price' => $price,
                                'priceUnit' => isset($priceUnit) ? $priceUnit : null,
                                'isAvailable' => $isAvailable,
                                'isSamePrice' => $isSamePrice
                            ];
                            return $requestedItem;
                        }
                    }
                }
            }   
        }
    }
}
