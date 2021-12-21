<?php

use Flexie\Fatura\Fiskalizimi;
use Flexie\Fatura\Fx;

require __DIR__ . "/../vendor/autoload.php";
$start = microtime(true);

// Initialize main fiskalizimi object with your Flexie CRM KEY
$fiskalizimi = new Fiskalizimi("Tw8Yewd1U0d4hViNzGrbLliRlteKTMBT");

try {
    // Create a new TCR, it would return the new TCR Code
    $newTcr = $fiskalizimi->addTcr("Flexie-CRM/" . uniqid(), new DateTime("now"));
    echo $newTcr;
} catch (Exception $e) {
    print_r($e->getMessage());
}

$time_elapsed_secs = microtime(true) - $start;
echo PHP_EOL . "Fiskalizimi in {$time_elapsed_secs} seconds" . PHP_EOL;