<?php

namespace Flexie\Fatura;

/**
 *
 */
class Invoice
{
    /**
     * @var string
     */
    protected $invoiceNumber;

    /**
     * @var string
     */
    protected $dateTimeIssued;

    /**
     * @var string
     */
    protected $operatorCode;

    /**
     * @var string
     */
    protected $tcrCode;

    /**
     * @var string
     */
    protected $clientName;

    /**
     * @var string
     */
    protected $clientNuis;

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $clientAddress;

    /**
     * @var string
     */
    protected $clientCity;

    /**
     * @var string
     */
    protected $clientCountryCode;

    /**
     * @var string
     */
    protected $invoiceType;

    /**
     * @var string
     */
    protected $autoInvoiceType;

    /**
     * @var int
     */
    protected $dueDate;

    /**
     * @var string
     */
    protected $periodStart;

    /**
     * @var string
     */
    protected $periodEnd;

    /**
     * @var string
     */
    protected $paymentMethod;

    /**
     * @var string
     */
    protected $paymentType;

    /**
     * @var string
     */
    protected $businessProcess;

    /**
     * @var string
     */
    protected $bankName;

    /**
     * @var string
     */
    protected $bankIban;

    /**
     * @var
     */
    protected $bankSwift;

    /**
     * @var string
     */
    protected $currency = "ALL";

    /**
     * @var float
     */
    protected $currencyRate = 1.00;

    /**
     * @var float
     */
    protected $vatTotal = 0.00;

    /**
     * @var float
     */
    protected $totalBeforeVat = 0.00;

    /**
     * @var float
     */
    protected $totalAfterVat = 0.00;

    /**
     * @var string
     */
    protected $referenceInvoiceNslf;

    /**
     * @var string
     */
    protected $referenceInvoiceDateTimeIssued;

    /**
     * @var array
     */
    protected $items = [];

    /**
     * @var string
     */
    protected $webhookCallback;

    /**
     * @var string
     */
    protected $sendToEmail;

    /**
     * @var array
     */
    protected $flexieWorkflowAdditionalData;

    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @return string
     */
    public function getOperatorCode(): string
    {
        return $this->operatorCode;
    }

    /**
     * @param string $operatorCode
     */
    public function overrideOperatorCode(string $operatorCode)
    {
        $this->operatorCode = $operatorCode;
    }

    /**
     * @return string
     */
    public function getTcrCode(): string
    {
        return $this->tcrCode;
    }

    /**
     * @param string $tcrCode
     */
    public function overrideTcrCode(string $tcrCode)
    {
        $this->tcrCode = $tcrCode;
    }

    /**
     * @return string
     */
    public function getInvoiceNumber(): string
    {
        return $this->invoiceNumber;
    }

    /**
     * @param string $invoiceNumber
     */
    public function overrideInvoiceNumber(string $invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    /**
     * @return string
     */
    public function getDateTimeIssued(): string
    {
        return $this->dateTimeIssued;
    }

    /**
     * @param string $dateTimeIssued
     */
    public function overrideDateTimeIssued(string $dateTimeIssued)
    {
        $this->dateTimeIssued = $dateTimeIssued;
    }

    /**
     * @return string
     */
    public function getClientName(): string
    {
        return $this->clientName;
    }

    /**
     * @param string $clientName
     */
    public function setClientName(string $clientName)
    {
        $this->clientName = $clientName;
    }

    /**
     * @return string
     */
    public function getClientNuis(): string
    {
        return $this->clientNuis;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @param string $clientNuis
     */
    public function setClientNuis(string $clientNuis)
    {
        $this->clientNuis = $clientNuis;
    }

    /**
     * @return string
     */
    public function getClientAddress(): string
    {
        return $this->clientAddress;
    }

    /**
     * @param string $clientAddress
     */
    public function setClientAddress(string $clientAddress)
    {
        $this->clientAddress = $clientAddress;
    }

    /**
     * @return string
     */
    public function getClientCity(): string
    {
        return $this->clientCity;
    }

    /**
     * @param string $clientCity
     */
    public function setClientCity(string $clientCity)
    {
        $this->clientCity = $clientCity;
    }

    /**
     * @return string
     */
    public function getClientCountryCode(): string
    {
        return $this->clientCountryCode;
    }

    /**
     * @param string $clientCountryCode
     */
    public function setClientCountryCode(string $clientCountryCode)
    {
        $this->clientCountryCode = $clientCountryCode;
    }

    /**
     * @return string
     */
    public function getInvoiceType(): string
    {
        return $this->invoiceType;
    }

    /**
     * @param mixed $invoiceType
     */
    public function setInvoiceType($invoiceType)
    {
        $this->invoiceType = $invoiceType;
    }

    /**
     * @return string
     */
    public function getAutoInvoiceType(): string
    {
        return $this->autoInvoiceType;
    }

    /**
     * @param string $autoInvoiceType
     */
    public function setAutoInvoiceType(string $autoInvoiceType)
    {
        $this->autoInvoiceType = $autoInvoiceType;
    }

    /**
     * @return int
     */
    public function getDueDate(): int
    {
        return $this->dueDate;
    }

    /**
     * @param int $dueDate
     */
    public function setDueDate(int $dueDate)
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return string
     */
    public function getPeriodStart(): string
    {
        return $this->periodStart;
    }

    /**
     * @param mixed $periodStart
     */
    public function setPeriodStart($periodStart)
    {
        $this->periodStart = $periodStart;
    }

    /**
     * @return string
     */
    public function getPeriodEnd(): string
    {
        return $this->periodEnd;
    }

    /**
     * @param string $periodEnd
     */
    public function setPeriodEnd(string $periodEnd)
    {
        $this->periodEnd = $periodEnd;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * @param mixed $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        // Set also paymentType which is derived from the paymentMethod
        switch ($paymentMethod) {
            case Fx::PAYMENT_METHOD_CASH:
            case Fx::PAYMENT_METHOD_CREDIT_CARD:
            case Fx::PAYMENT_METHOD_CHECK:
            case Fx::PAYMENT_METHOD_SVOUCHER:
            case Fx::PAYMENT_METHOD_COMPANY:
            case Fx::PAYMENT_METHOD_ORDER:
                $this->setPaymentType("CASH");
                break;
            case Fx::PAYMENT_METHOD_BANK:
            case Fx::PAYMENT_METHOD_FACTORING:
            case Fx::PAYMENT_METHOD_COMPENSATION:
            case Fx::PAYMENT_METHOD_TRANSFER:
            case Fx::PAYMENT_METHOD_WAIVER:
            case Fx::PAYMENT_METHOD_KIND:
            case Fx::PAYMENT_METHOD_OTHER:
                $this->setPaymentType("NONCASH");
                break;
        }
    }

    /**
     * @return string
     */
    public function getBusinessProcess(): string
    {
        return $this->businessProcess;
    }

    /**
     * @param string $businessProcess
     */
    public function setBusinessProcess(string $businessProcess)
    {
        $this->businessProcess = $businessProcess;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     */
    public function setBankName(string $bankName)
    {
        $this->bankName = $bankName;
    }

    /**
     * @return string
     */
    public function getBankIban(): string
    {
        return $this->bankIban;
    }

    /**
     * @param string $bankIban
     */
    public function setBankIban(string $bankIban)
    {
        $this->bankIban = $bankIban;
    }

    /**
     * @return string
     */
    public function getBankSwift(): string
    {
        return $this->bankSwift;
    }

    /**
     * @param string $bankSwift
     */
    public function setBankSwift(string $bankSwift)
    {
        $this->bankSwift = $bankSwift;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getCurrencyRate(): int
    {
        return $this->currencyRate;
    }

    /**
     * @param int $currencyRate
     */
    public function setCurrencyRate(int $currencyRate)
    {
        $this->currencyRate = $currencyRate;
    }

    /**
     * @return float
     */
    public function getVatTotal(): float
    {
        return $this->vatTotal;
    }

    /**
     * @param float $vatTotal
     */
    public function setVatTotal(float $vatTotal)
    {
        $this->vatTotal = $vatTotal;
    }

    /**
     * @return float
     */
    public function getTotalBeforeVat(): float
    {
        return $this->totalBeforeVat;
    }

    /**
     * @param float $totalBeforeVat
     */
    public function setTotalBeforeVat(float $totalBeforeVat)
    {
        $this->totalBeforeVat = $totalBeforeVat;
    }

    /**
     * @return float
     */
    public function getTotalAfterVat(): float
    {
        return $this->totalAfterVat;
    }

    /**
     * @param float $totalAfterVat
     */
    public function setTotalAfterVat(float $totalAfterVat)
    {
        $this->totalAfterVat = $totalAfterVat;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param InvoiceItem $item
     */
    public function setItems(InvoiceItem $item)
    {
        $this->items[] = $item;
    }

    /**
     * @return string
     */
    public function getWebhookCallback(): string
    {
        return $this->webhookCallback;
    }

    /**
     * @param string $webhookCallback
     */
    public function setWebhookCallback(string $webhookCallback)
    {
        $this->webhookCallback = $webhookCallback;
    }

    /**
     * @return string
     */
    public function getSendToEmail(): string
    {
        return $this->sendToEmail;
    }

    /**
     * @param string $sendToEmail
     */
    public function setSendToEmail(string $sendToEmail)
    {
        $this->sendToEmail = $sendToEmail;
    }

    public function enrichInvoiceProperties(string $name, $value)
    {
        $this->{$name} = $value;
    }

    /**
     * @return string
     */
    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    /**
     * @param string $paymentType
     */
    private function setPaymentType(string $paymentType)
    {
        $this->paymentType = $paymentType;
    }

    /**
     * @return string
     */
    public function getReferenceInvoiceNslf(): string
    {
        return $this->referenceInvoiceNslf;
    }

    /**
     * @param string $referenceInvoiceNslf
     */
    public function setReferenceInvoiceNslf(string $referenceInvoiceNslf)
    {
        $this->referenceInvoiceNslf = $referenceInvoiceNslf;
    }

    /**
     * @return string
     */
    public function getReferenceInvoiceDateTimeIssued(): string
    {
        return $this->referenceInvoiceDateTimeIssued;
    }

    /**
     * @param string $referenceInvoiceDateTimeIssued
     */
    public function setReferenceInvoiceDateTimeIssued(string $referenceInvoiceDateTimeIssued)
    {
        $this->referenceInvoiceDateTimeIssued = $referenceInvoiceDateTimeIssued;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param string
     */
    private function setErrors(string $error)
    {
        $this->errors[] = $error;
    }

    /**
     * @return array
     */
    public function getFlexieWorkflowAdditionalData(): array
    {
        return $this->flexieWorkflowAdditionalData;
    }

    /**
     * @param array $flexieWorkflowAdditionalData
     */
    public function setFlexieWorkflowAdditionalData(array $flexieWorkflowAdditionalData)
    {
        $this->flexieWorkflowAdditionalData = $flexieWorkflowAdditionalData;
    }

    /**
     * @return string
     */
    public function toJSON(): string
    {
        $invoiceArray = get_object_vars($this);

        return json_encode(
            array_filter(
                array_map(function ($value) {
                    if (is_array($value) && isset($value[0]) && $value[0] instanceof InvoiceItem) {
                        return array_map(function (InvoiceItem $item) {
                            return $item->toArray();
                        }, $this->items);
                    }

                    return $value;
                }, $invoiceArray), function ($value) {
                return !empty($value);
            })
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $invoiceArray = get_object_vars($this);

        return array_filter(
            array_map(function ($value) {
                if (is_array($value) && isset($value[0]) && $value[0] instanceof InvoiceItem) {
                    return array_map(function (InvoiceItem $item) {
                        return $item->toArray();
                    }, $this->items);
                }

                return $value;
            }, $invoiceArray),
            function ($value) {
                return !empty($value);
            }
        );
    }
}