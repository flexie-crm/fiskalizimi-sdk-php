<?php

use Flexie\Fatura\Fiskalizimi;
use Flexie\Fatura\Fx;

require __DIR__ . "/../vendor/autoload.php";
$start = microtime(true);

// Initialize main fiskalizimi object with your Flexie CRM KEY
$fiskalizimi = new Fiskalizimi("Tw8Yewd1U0d4hViNzGrbLliRlteKTMBT");

try {
    // Operations in TCR, INITIAL, DEPOSIT, WITHDRAW
    $operation = $fiskalizimi->tcrOperation("INITIAL", 0.00, Fx::ASYNC);
    print_r($operation);

    $operation = $fiskalizimi->tcrOperation("DEPOSIT", 2000.00, Fx::SYNC);
    print_r($operation);
} catch (Exception $e) {
    print_r($e->getMessage());
}

$time_elapsed_secs = microtime(true) - $start;
echo PHP_EOL . "Fiskalizimi in {$time_elapsed_secs} seconds" . PHP_EOL;