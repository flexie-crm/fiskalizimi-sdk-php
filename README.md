# PHP SDK - Flexie CRM fiskalizimi solution

**Fiskalizimi PHP SDK** allows you to talk and generate your e-invoices programmatically from your own solution to Flexie CRM fiskalizimi automation platform.

## Installation

Clone this repo into your own environment

```bash
git clone https://github.com/flexie-crm/fiskalizimi-sdk-php.git
cd fiskalizimi-sdk-php
```

Use the package manager [composer](https://getcomposer.org/) to install Fiskalizimi PHP SDK dependences, which are just 2 of them, Guzzle and Firebase JWT.

```bash
composer install
```

## Usage in your own project/solution
Below it's just a simple example on how to use it, you would find more in the examples folder

```php
use Flexie\Fatura\Fiskalizimi;
use Flexie\Fatura\Fx;
use Flexie\Fatura\Invoice;
use Flexie\Fatura\InvoiceItem;

require __DIR__ . "/fiskalizimi-sdk-php/vendor/autoload.php";

$invoice = new Invoice();

// Invoice Details
$invoice->setInvoiceType(Fx::B2B);
$invoice->setPaymentMethod(Fx::PAYMENT_METHOD_BANK);
$invoice->setCurrency("EUR");
$invoice->setCurrencyRate(122.08);
$invoice->setVatTotal(40);
$invoice->setTotalBeforeVat(200);
$invoice->setTotalAfterVat(240);

// Customer Details, in this case using Personal ID as tax identifier
$invoice->setClientName("John Doe");
$invoice->setClientNuis("M00000000J");
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

// Obviously here would be your own items
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

    // Add to invoice items
    $invoice->setItems($item);
}

// Initialize main fiskalizimi object with your own Flexie CRM KEY
// The current key is for DEMO purpose and you can try right away
// and also operates in the TEST environment of Fiskalizimi service 
$fiskalizimi = new Fiskalizimi("Tw8Yewd1U0d4hViNzGrbLliRlteKTMBT");

try {
    // Send it to Flexie CRM to finalize the Fiskalizimi process,
    // there is also an optional toJSON() method you can use here.
    $invoiceData = $fiskalizimi->newInvoice($invoice)->toArray();
    
    // $invoiceData["nivf"], and some other variables would be added 
    // to the initial payload which is sent to Flexie, this way you 
    // have the full invoice object including all details from Fiskalizimi
} catch (Exception $e) {
    // Handle errors here
    print_r($e->getMessage());
}
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)
