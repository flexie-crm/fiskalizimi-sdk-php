<?php

use Flexie\Fatura\Fiskalizimi;
use Flexie\Fatura\Fx;
use Flexie\Fatura\Invoice;
use Flexie\Fatura\InvoiceItem;

require __DIR__ . "/../vendor/autoload.php";
$start = microtime(true);

// Initialize main fiskalizimi object with your Flexie CRM KEY
$fiskalizimi = new Fiskalizimi("Tw8Yewd1U0d4hViNzGrbLliRlteKTMBT");

try {
    // Get Invoice EIC code from your invoice NIVF Code
    $currencyRate = $fiskalizimi->getCurrencyRate();
    print_r($currencyRate);
} catch (Exception $e) {
    print_r($e->getMessage());
}

$time_elapsed_secs = microtime(true) - $start;
echo PHP_EOL . "Fiskalizimi in {$time_elapsed_secs} seconds" . PHP_EOL;