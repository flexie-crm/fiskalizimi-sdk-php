<?php

use Flexie\Fatura\Fiskalizimi;

require __DIR__ . "/../vendor/autoload.php";
$start = microtime(true);

// Initialize main fiskalizimi object with your Flexie CRM KEY
$fiskalizimi = new Fiskalizimi("Tw8Yewd1U0d4hViNzGrbLliRlteKTMBT");

try {
    // Get Invoice EIC code from your invoice NIVF Code
    $eic = $fiskalizimi->getEInvoiceCode("9081b311-0ddb-486e-b007-62d6a1464c3d");
    echo $eic;
} catch (Exception $e) {
    print_r($e->getMessage());
}

$time_elapsed_secs = microtime(true) - $start;
echo PHP_EOL . "Fiskalizimi in {$time_elapsed_secs} seconds" . PHP_EOL;