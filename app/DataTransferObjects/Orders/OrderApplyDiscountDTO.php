<?php

namespace App\DataTransferObjects\Orders;

/**
 * Actualizar Aplicar Descuento
 * 'status' =>  Order::EN_VALIDACION,
'total'=> $toDiscountData['total_price_neto'],
'tax'=>Order::IVA_PERCENTAGE,
'discount' => 0,
'grand_total'=> $toDiscountData['total_price_neto'] * Order::IVA_FOR_CALCULATE,
 */
class OrderApplyDiscountDTO
{
    /**
     * @var ?string
     */
    private $status;

    /**
     * @var ?int
     */
    private $total;

    /**
     * @var ?int
     */
    private $tax;

    /**
     * @var ?int
     */
    private $discount;

    /**
     * @var ?int
     */
    private $grand_total;

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * @param int|null $total
     */
    public function setTotal(?int $total): void
    {
        $this->total = $total;
    }

    /**
     * @return int|null
     */
    public function getTax(): ?int
    {
        return $this->tax;
    }

    /**
     * @param int|null $tax
     */
    public function setTax(?int $tax): void
    {
        $this->tax = $tax;
    }

    /**
     * @return int|null
     */
    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    /**
     * @param int|null $discount
     */
    public function setDiscount(?int $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return int|null
     */
    public function getGrandTotal(): ?int
    {
        return $this->grand_total;
    }

    /**
     * @param int|null $grand_total
     */
    public function setGrandTotal(?int $grand_total): void
    {
        $this->grand_total = $grand_total;
    }
}
