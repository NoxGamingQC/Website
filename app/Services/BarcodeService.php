<?php

namespace App\Services;

use Picqer\Barcode\BarcodeGeneratorPNG;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BarcodeService
{
    public static function generate(
        string $value,
        string $type = 'qr',
        string|int|null $format = null
    ): string {

        if (strtolower($type) === 'qr') {

            return 'data:image/png;base64,' . base64_encode(
                QrCode::format('png')
                    ->size(300)
                    ->generate($value)
            );
        }

        $generator = new BarcodeGeneratorPNG();

        return 'data:image/png;base64,' . base64_encode(
            $generator->getBarcode(
                $value,
                $generator::TYPE_CODE_128
            )
        );
    }
}