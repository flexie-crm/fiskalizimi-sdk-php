<?php

use Flexie\Fatura\Fiskalizimi;

require __DIR__ . "/../vendor/autoload.php";
$start = microtime(true);

// Initialize main fiskalizimi object with your Flexie CRM KEY
$fiskalizimi = new Fiskalizimi("Tw8Yewd1U0d4hViNzGrbLliRlteKTMBT");

try {
    $parametersToValidate = [
        // Flexie CRM subscription state true/false
        "isActiveSubscription" => "Tw8Yewd1U0d4hViNzGrbLliRlteKTMBT",
        // Business unit code configured in Flexie CRM for this account key
        "businessUnitCode" => "om609ur125",
        // Operator Code configured in Flexie CRM for this account key
        "operatorCode" => "vp233km645",
        // Cash register code created from Flexie CRM for this account at signup time
        "tcrCode" => "zj146cd142",
        // Issuer Nuis configured in Flexie CRM for this account key
        "nuis" => "J61912013U",
        // Fiskalizimi Certificate fingerprint
        "certFingerprint" => "883ae8d512304ab30ca5638f961b92315b856723",
        // Fiskalizimi Certificate valid from timestamp
        "certValidFrom" => "1610378164",
        // Fiskalizimi Certificate valid to timestamp
        "certValidTo" => "1641914164"
    ];


    // Send payload to Flexie CRM to validate parameters,
    // which are subject to change from time to time, but this
    // method remains the same, and it won't need any change
    $parametersData = $fiskalizimi->subscriptionParametersValidity($parametersToValidate);
    print_r($parametersData);
} catch (Exception $e) {
    print_r($e->getMessage());
}

$time_elapsed_secs = microtime(true) - $start;
echo PHP_EOL . "Parameters validation in {$time_elapsed_secs} seconds" . PHP_EOL;