<?php

use Flexie\Fatura\Fiskalizimi;
use Flexie\Fatura\Fx;
use Flexie\Fatura\Invoice;
use Flexie\Fatura\InvoiceItem;

require __DIR__ . "/../vendor/autoload.php";
$start = microtime(true);

$invoice = new Invoice();

// Invoice Details
$invoice->setInvoiceType(Fx::EXPORT_INVOICE);
$invoice->setPaymentMethod(Fx::PAYMENT_METHOD_BANK);
$invoice->setCurrency("EUR");
$invoice->setCurrencyRate(122.02);
$invoice->setVatTotal(0);
$invoice->setTotalBeforeVat(200);
$invoice->setTotalAfterVat(200);

// Customer Details, in this case using Personal ID as tax identifier
$invoice->setClientName("John Doe");
$invoice->setClientNuis("TAXIDFORB2B");
$invoice->setClientAddress("ZIP ... 12345");
$invoice->setClientCity("Chicago");
$invoice->setClientCountryCode("USA");

// Bank Details
$invoice->setBankName("Some Random Bank");
$invoice->setBankSwift("ALBBALS");
$invoice->setBankIban("AL00010001111111111111111111");

foreach([1, 2] as $_) {
    $item = new InvoiceItem();

    // Item details
    $item->setItemCode(uniqid());
    $item->setItem("Artikulli - " . uniqid());
    $item->setQty(1);
    $item->setPrice(100);
    $item->setQtyUnit("Cope");
    $item->setQtyUnitUblCode("XPP");

    // VAT Rate should be one of the following
    // 0.20
    // 0.10
    // 0.06
    // 0.00
    // MARGIN_SCHEME
    // EXPORT_OF_GOODS
    // TYPE_1
    // TYPE_2
    $item->setVatRate(Fx::VAT_EXPORT);

    $item->setTotalBeforeVat(100);
    $item->setTotalAfterVat(100);
    $item->setVatTotal(0);
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