<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Square;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Square\Exceptions\ApiException;
use App\Http\Controllers\Controller;

class SquareController extends Controller
{
    

    public function index() {
        $squareClient = Square::getAccess();
        $items = Square::getItems($squareClient);
        $categories = Square::getAvailableCategories($squareClient);

        return view('store', [
            'categories' => $categories,
            'items' => $items
        ]);
    }
}