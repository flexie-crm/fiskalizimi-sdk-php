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
     * @param string $nslf
     */
    public function setNslf(string $nslf)
    {
        $this->nslf = $nslf;
    }

    /**
     * @return string
     */
    public function getNslf(): string
    {
        return $this->nslf;
    }

    /**
     * @param string $nivf
     */
    public function setNivf(string $nivf)
    {
        $this->nivf = $nivf;
    }

    /**
     * @return string
     */
    public function getNivf(): string
    {
        return $this->nivf;
    }

    /**
     * @return string
     */
    public function getQrCodeUrl(): string
    {
        return $this->qrCodeUrl;
    }

    /**
     * @param string $qrCodeUrl
     */
    public function setQrCodeUrl(string $qrCodeUrl)
    {
        $this->qrCodeUrl = $qrCodeUrl;
    }

    /**
     * @return array
     */
    public function getVatGroups(): array
    {
        return $this->vatGroups;
    }

    public function setVatGroups(array $vatGroups)
    {
        $this->vatGroups = $vatGroups;
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