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

    // Check if successful by looking if NIVF code exists
    if (!isset($invoiceData["nivf"])) {
        exit("No NIVF code returned from Flexie");
    }

    // Once here, you can have a separate procedure to get EIC,
    // since it's a separate service, and it frequently fails
    // or delays more than 20 seconds to reply to requests
    $counter = 0; for(;;) {
        $eic = $fiskalizimi->getEInvoiceCode($invoiceData["nivf"]);

        if (!empty($eic)) {
            echo "Got EIC - " . $eic . PHP_EOL;

            $time_elapsed_secs = microtime(true) - $start;
            echo PHP_EOL . "Fiskalizimi in {$time_elapsed_secs} seconds" . PHP_EOL;
            exit;
        }

        if ($counter == 10) {
            // Just quit if no EIC is returned
            // most probably Fiskalizimi has some issues
            // In this case Flexie would retry until it's done
            exit("Too much time and no EIC, so I'm quiting now");
        }

        sleep(4); $counter++;
    }
} catch (Exception $e) {
    print_r($e->getMessage());
}