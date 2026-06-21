<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Company;

class BarcodeController extends Controller
{
    /**
     * Display the generate barcode page.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        if ($request->filled('company')) {
            $company = Company::where('alias', $request->company)->first();
        }

        return view('tools.generate-barcode')->with([
            'currentPage' => 'generate-barcode',
            'currentTab' => 'tools',
            'company' => $company ?? null
        ]);
    }

    public function generate(Request $request)
{
    if ($request->filled('company')) {
        $company = Company::where('alias', $request->company)->first();
    }
    $request->validate([
        'list' => 'required|string'
    ]);

    // Nettoyage Excel (newline, tab, carriage return)
    $raw = $request->list;

    // Split robuste Excel copy/paste
    $items = preg_split('/\r\n|\r|\n|\t/', $raw);

    // Nettoyage final
    $items = array_values(array_filter(array_map('trim', $items)));

    $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();

    $barcodes = [];

    foreach ($items as $item) {
        if ($item === '') continue;

        $barcodes[] = [
            'value' => $item,
            'img' => base64_encode(
                $generator->getBarcode($item, $generator::TYPE_CODE_128)
            )
        ];
    }

    return view('tools.generate-barcode', compact('barcodes'))->with('company', $company);
}
}