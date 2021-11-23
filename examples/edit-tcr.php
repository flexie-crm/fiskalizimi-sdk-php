<?php

use Flexie\Fatura\Fiskalizimi;
use Flexie\Fatura\Fx;

require __DIR__ . "/../vendor/autoload.php";
$start = microtime(true);

// Initialize main fiskalizimi object with your Flexie CRM KEY
$fiskalizimi = new Fiskalizimi("Tw8Yewd1U0d4hViNzGrbLliRlteKTMBT");

try {
    // Edit the TCR, typically used to close it, by setting the validTo Date
    // It would return a bool value, either it's done or not
    $bool = $fiskalizimi->editTcr("Flexie-CRM/619d0d2ed94e2", new DateTime("+1 Year"));
    print_r($bool);
} catch (Exception $e) {
    print_r($e->getMessage());
}

$time_elapsed_secs = microtime(true) - $start;
echo PHP_EOL . "Fiskalizimi in {$time_elapsed_secs} seconds" . PHP_EOL;