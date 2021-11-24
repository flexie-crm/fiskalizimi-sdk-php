<?php

namespace Flexie\Fatura;

class InvoiceItem
{
    /**
     * @var string
     */
    protected $itemCode;

    /**
     * @var string
     */
    protected $item;

    /**
     * @var float
     */
    protected $qty = 0.00;

    /**
     * @var float
     */
    protected $price = 0.00;

    /**
     * @var string
     */
    protected $qtyUnit = "Cope";

    /**
     * @var string
     */
    protected $qtyUnitUblCode = "XPP";

    /**
     * @var float
     */
    protected $vatTotal = 0.00;

    /**
     * @var float
     */
    protected $vatRate = 0.20;

    /**
     * @var float
     */
    protected $totalBeforeVat = 0.00;

    /**
     * @var float
     */
    protected $totalAfterVat = 0.00;

    /**
     * @return string
     */
    public function getItemCode(): string
    {
        return $this->itemCode;
    }

    /**
     * @param string $itemCode
     */
    public function setItemCode(string $itemCode)
    {
        $this->itemCode = $itemCode;
    }

    /**
     * @return string
     */
    public function getItem(): string
    {
        return $this->item;
    }

    /**
     * @param string $item
     */
    public function setItem(string $item)
    {
        $this->item = $item;
    }

    /**
     * @return float
     */
    public function getQty(): float
    {
        return $this->qty;
    }

    /**
     * @param float $qty
     */
    public function setQty(float $qty)
    {
        $this->qty = $qty;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getQtyUnit(): string
    {
        return $this->qtyUnit;
    }

    /**
     * @param string $qtyUnit
     */
    public function setQtyUnit(string $qtyUnit)
    {
        $this->qtyUnit = $qtyUnit;
    }

    /**
     * @return string
     */
    public function getQtyUnitUblCode(): string
    {
        return $this->qtyUnitUblCode;
    }

    /**
     * @param string $qtyUnitUblCode
     */
    public function setQtyUnitUblCode(string $qtyUnitUblCode)
    {
        $this->qtyUnitUblCode = $qtyUnitUblCode;
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
    public function getVatRate(): float
    {
        return $this->vatRate;
    }

    /**
     * @param float|string $vatRate
     */
    public function setVatRate($vatRate)
    {
        $this->vatRate = $vatRate;
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
     * @return string
     */
    public function toJSON(): string
    {
        return json_encode(get_object_vars($this));
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}