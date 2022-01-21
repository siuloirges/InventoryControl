<?php

namespace App\DataTransferObjects\Orders;

class ListProductGetOrderDTO
{
    /**
     * @var ?int
     */
    private $productId;

    /**
     * @var ?int
     */
    private $quantity;

    /**
     * @var ?bool
     */
    private $isCombo;

    private $kit;

     /**
     * @var ?int
     */
    private $discount;


    /**
     * @return int|null
     */

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * @param int|null $productId
     */
    public function setProductId(?int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     */
    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }


    /**
     * @return bool|null
     */

    public function GetIsCombo(): ?bool
    {
        return $this->isCombo;
    }

    /**
     * @param bool|null $isCombo
     */
    public function SetIsCombo(?bool $bool): void
    {
        $this->isCombo = $bool;
    }

    public function Getkit()
    {
        return $this->kit;
    }


    public function Setkit($detail): void
    {
        $this->kit = $detail;
    }

    /**
    * @return bool|null
    */
    public function GetDiscount()
    {
        return $this->discount;
    }

    /**
    * @param bool|null $isCombo
    */
    public function SetDiscount($num): void
    {
        $this->discount = $num;
    }


}
