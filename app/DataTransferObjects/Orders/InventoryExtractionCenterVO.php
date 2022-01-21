<?php


namespace App\DataTransferObjects\Orders;


class InventoryExtractionCenterVO
{
  /**
  * @var ?int
  */
  private  $StoresId;

  /**
  * @var ?int
  */
  private  $OrderID;

  /**
   * @var ?int
   */
  private  $OrderDetailID;

  /**
   * @var ?int
   */
  private $StockID;

  /**
   * @var ?int
   */
  private $Quantity;

  /**
   * @var ?bool
   */
  private $IsInt;

  /**
   * @var ?bool
   */
  private $IsOut;

  /**
   * @var ?array
   */
  private $InventoryList;


    /**
     * InventoryExtractionCenterVO constructor.
     * @param int|null $StoresId
     * @param int|null $OrderID
     * @param int|null $OrderDetailID
     * @param int|null $StockID
     * @param int|null $Quantity
     * @param bool|null $IsInt
     * @param bool|null $IsOut
     * @param array|null $InventoryList
     */
    public function __construct(?int $StoresId, ?int $OrderID, ?int $OrderDetailID, ?int $StockID, ?int $Quantity, ?bool $IsInt, ?bool $IsOut, ?array $InventoryList )
    {
        $this->StoresId = $StoresId;
        $this->OrderID = $OrderID;
        $this->OrderDetailID = $OrderDetailID;
        $this->StockID = $StockID;
        $this->Quantity = $Quantity;
        $this->IsInt = $IsInt;
        $this->IsOut = $IsOut;
        $this->InventoryList = $InventoryList;
    }

    /**
     * @return int|null
     */
    public function getStoresId(): ?int
    {
        return $this->StoresId;
    }

    /**
     * @return int|null
     */
    public function getOrderID(): ?int
    {
        return $this->OrderID;
    }

    /**
     * @return int|null
     */
    public function getOrderDetailID(): ?int
    {
        return $this->OrderDetailID;
    }

    /**
     * @return int|null
     */
    public function getStockID(): ?int
    {
        return $this->StockID;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    /**
     * @return bool|null
     */
    public function getIsInt(): ?bool
    {
        return $this->IsInt;
    }

    /**
     * @return bool|null
     */
    public function getIsOut(): ?bool
    {
        return $this->IsOut;
    }

    /**
     * @return array|null
     */
    public function getInventoryList(): ?array
    {
        return $this->InventoryList;
    }
}
