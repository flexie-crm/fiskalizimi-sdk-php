<?php

use Flexie\Fatura\Fiskalizimi;
use Flexie\Fatura\Fx;
use Flexie\Fatura\Invoice;
use Flexie\Fatura\InvoiceItem;

require __DIR__ . "/../vendor/autoload.php";
$start = microtime(true);

$invoice = new Invoice();

// Invoice Details
$invoice->setInvoiceType(Fx::B2B);
$invoice->setBusinessProcess(Fx::BUSINESS_PROCESS_P1);
$invoice->setPaymentMethod(Fx::PAYMENT_METHOD_BANK);
$invoice->setCurrency("ALL");
$invoice->setVatTotal(40);
$invoice->setTotalBeforeVat(200);
$invoice->setTotalAfterVat(240);

// Customer Details, in this case using Personal ID as tax identifier
$invoice->setClientName("John Doe");
$invoice->setClientNuis("M01315009J");
$invoice->setClientAddress("ZIP ... 12345");
$invoice->setClientCity("Tirane");
$invoice->setClientCountryCode("ALB");

// Bank Details
$invoice->setBankName("Some Random Bank");
$invoice->setBankSwift("ALBBALS");
$invoice->setBankIban("AL00010001111111111111111111");

// You can send additional data to Flexie CRM in case you have a full subscription
// and want to create integrations or getting deeper with your financial data
// $invoice->setFlexieWorkflowAdditionalData([
//     "customData" => "Custom Data",
// ]);

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