<?php

use Flexie\Fatura\Fiskalizimi;
use Flexie\Fatura\Fx;
use Flexie\Fatura\Invoice;
use Flexie\Fatura\InvoiceItem;

require __DIR__ . "/../vendor/autoload.php";
$start = microtime(true);

$invoice = new Invoice();

// Invoice Details
$invoice->setInvoiceType(Fx::B2C);
$invoice->setPaymentMethod(Fx::PAYMENT_METHOD_CASH);
$invoice->setCurrency("ALL");
$invoice->setVatTotal(40);
$invoice->setTotalBeforeVat(200);
$invoice->setTotalAfterVat(240);

// Override with your own offline procedure to derive invoice number and date time issued
// $invoice->overrideInvoiceNumber("648/2021/zj146cd142");
// $invoice->overrideDateTimeIssued("2021-12-21T22:05:45+01:00");

foreach([1, 2] as $_) {
    $item = new InvoiceItem();

    // Item details
    $item->setItemCode(uniqid());
    $item->setItem("Artikulli - " . uniqid());
    $item->setQty(1);
    $item->setPrice(100);
    $item->setQtyUnit("Cope");
    $item->setQtyUnitUblCode("XPP");
    $item->setVatRate(0.20);
    $item->setTotalBeforeVat(100);
    $item->setTotalAfterVat(120);
    $item->setVatTotal(20);
    $invoice->setItems($item);
}

// Initialize main fiskalizimi object with your Flexie CRM KEY
$fiskalizimi = new Fiskalizimi("Tw8Yewd1U0d4hViNzGrbLliRlteKTMBT");
$fiskalizimi->timeout = 5;

try {
    // Send it to Flexie CRM to finalize the Fiskalizimi process,
    // there is also an optional toJSON() method you can use here.
    $invoiceData = $fiskalizimi->newInvoice($invoice)->toArray();
    print_r($invoiceData);
} catch (Exception $e) {
    print_r($e->getMessage());
}

$time_elapsed_secs = microtime(true) - $start;
echo PHP_EOL . "Fiskalizimi in {$time_elapsed_secs} seconds" . PHP_EOL;