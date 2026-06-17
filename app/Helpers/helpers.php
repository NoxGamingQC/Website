<?php

use App\Services\BarcodeService;

if (! function_exists('barcode')) {

    function barcode(
        string $value,
        string $type = 'qr',
        string|int|null $format = null
    ): string {

        return BarcodeService::generate(
            $value,
            $type,
            $format
        );
    }
}