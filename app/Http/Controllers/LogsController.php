<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\PageLists;

class LogsController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->is_management) {
                if($request->date) {
                    $date = new Carbon($request->date);
                } else {
                    $date = new Carbon(today());
                }
                $parsedDate = $date->format('Y-m-d');
                $filePath = storage_path("logs/laravel-{$parsedDate}.log");
                $data = [];
                $fileData = [];
                $dataDate = [];
                $dataStatus = [];
                $dataStatusColor = [];
                if(File::exists($filePath)) {
                    $rawData = explode("\n", File::get($filePath));
                    $errorNumber = 0;
                    foreach($rawData as $key => $value) {
                        if ($value == '"} ') {
                            $errorNumber += 1;
                        }
                        if(array_key_exists($errorNumber, $fileData)) {
                            if(strlen($value) > 1) {
                                $newData = $fileData[$errorNumber] . '\n' . utf8_encode($value);
                                $fileData[$errorNumber] = $newData;
                            }
                        } else {
                            if($value !== '"} ' && strlen($value) > 1) {
                                array_push($fileData, utf8_encode($value));
                            }
                        }
                    }
                    foreach($fileData as $key => $value) {
                        $logDate = str_replace("[", "", explode("]", $value)[0]) ? Carbon::parse(str_replace("[", "", explode("]", $value)[0]))->format('Y-m-d H:i:s') : '';
                        $logStatus = "undefined";
                        if(str_contains($value, 'developement.ERROR') || str_contains($value, 'production.ERROR')) {
                            $logStatus = "Error";
                            $logStatusColor = "danger";
                        } elseif(str_contains($value, 'developement.WARNING') || str_contains($value, 'production.WARNING')) {
                            $logStatus = "Warning";
                            $logStatusColor = "warning";
                        } elseif(str_contains($value, 'developement.INFO') || str_contains($value, 'production.INFO')) {
                            $logStatus = "Info";
                            $logStatusColor = "info";
                        } elseif(str_contains($value, 'developement.ALERT') || str_contains($value, 'production.ALERT')) {
                            $logStatus = "Alert";
                            $logStatusColor = "warning";
                        } elseif(str_contains($value, 'developement.EMERGENCY') || str_contains($value, 'production.EMERGENCY')) {
                            $logStatus = "Emergency";
                            $logStatusColor = "danger";
                        } elseif(str_contains($value, 'developement.CRITICAL') || str_contains($value, 'production.CRITICAL')) {
                            $logStatus = "Critical";
                            $logStatusColor = "danger";
                        } elseif(str_contains($value, 'developement.NOTICE') || str_contains($value, 'production.NOTICE')) {
                            $logStatus = "Notice";
                            $logStatusColor = "warning";
                        } elseif(str_contains($value, 'developement.DEBUG') || str_contains($value, 'production.DEBUG')) {
                            $logStatus = "Debug";
                            $logStatusColor = "primary";
                        } else {
                            $logStatusColor = "default";
                        }
                        array_push($dataDate, $logDate);
                        array_push($dataStatusColor, $logStatusColor);
                        array_push($dataStatus, $logStatus);
                }
                }
                if(File::exists($filePath)) {
                    $data = [
                        'lastModified' => Carbon::parse(date("Y-m-d H:i:s", File::lastModified($filePath))),
                        'size' => File::size($filePath),
                        'isReadable' => File::isReadable($filePath),
                        'file' => $fileData,
                        'elementsDates' => $dataDate,
                        'elementsStatus' => $dataStatus,
                        'elementsStatusColor' => $dataStatusColor
                    ];  
                }
                return view('view.management.logs', compact('date', 'data'));
            }
        }
        abort(403);
    }

    public function download(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->is_management) {
                if($request->date) {
                    $date = new Carbon($request->date);
                } else {
                    $date = new Carbon(today());
                }
                $parsedDate = $date->format('Y-m-d');
                $filePath = storage_path("logs/laravel-{$parsedDate}.log");

                return response()->download($filePath);
            }
        }
    }
}