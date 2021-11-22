<?php

use Flexie\Fatura\Fiskalizimi;
use Flexie\Fatura\Fx;
use Flexie\Fatura\Invoice;
use Flexie\Fatura\InvoiceItem;

require __DIR__ . "/vendor/autoload.php";

$start = microtime(true);

$fiskalizimi = new Fiskalizimi("Tw8Yewd1U0d4hViNzGrbLliRlteKTMBT");

$invoice = new Invoice();
$invoice->setClientName("Eriol Gjerji");
$invoice->setClientId("J345353345J");
// $invoice->setClientNuis("M01315009J");
$invoice->setClientAddress("Rruga Barrikadave");
$invoice->setClientCity("Tirane");
$invoice->setClientCountryCode("ALB");
$invoice->setInvoiceType(Fx::B2C);
// $invoice->setBusinessProcess("P2");
$invoice->setPaymentMethod("ACCOUNT");
$invoice->setCurrency("ALL");
$invoice->setVatTotal(40);
$invoice->setTotalBeforeVat(200);
$invoice->setTotalAfterVat(240);
// $invoice->overrideTcrCode("bn439px779");
// $invoice->setBankName("Raiffeisen Bank");
// $invoice->setBankSwift("SGSBALTX");
// $invoice->setBankIban("AL09202110130000008001003841");

// Add some callback if you want to get back the full data of invoice
// $invoice->setWebhookCallback("https://fx.flexie.io/listener/f03176aa4c2d4de93f964af09a942001/5e3fb5ea2c792dfca9782b512953911a");

// Add email address if you want to send invoice to someone
// $invoice->setSendToEmail("your-email@gmail.com");

$item = new InvoiceItem();
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

$item = new InvoiceItem();
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

try {
    $invoiceDone = $fiskalizimi->newInvoice($invoice, Fx::SYNC)->toArray();
    print_r($invoiceDone);
} catch (Exception $e) {
    print_r($e->getMessage());
}

// try {
//     $tcrOperation = $fiskalizimi->tcrOperation("WITHDRAW", 1000);
//     print_r($tcrOperation);
// } catch (Exception $e) {
//     print_r($e->getMessage());
// }

// try {
//     $isNuisValid = $fiskalizimi->validateNuis("M01315009J");
//     print_r($isNuisValid);
// } catch (Exception $e) {
//     print_r($e->getMessage());
// }

$time_elapsed_secs = microtime(true) - $start;
echo PHP_EOL;
echo $time_elapsed_secs . PHP_EOL;