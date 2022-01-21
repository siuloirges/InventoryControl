<?php

namespace App\DataTransferObjects\Orders;

class GetOrderRequestDTO
{

    /**
     * @var ?int
     */
    private $userId;

    /**
     * @var ?int
     */
    private $storesId;

    /**
     * @var ?int
     */
    private $clientId;

    /**
     * @var ?int
     */
    private $phone;


    /**
     * @var array|ListProductGetOrderDTO
     */
    private $listProduct = [];

    /**
     * @var ?string
     */
    private $address;

    /**
     * @var ?int
     */
    private $municipalityId;

    /**
     * @var ?int
     */
    private $departmentId;

    /**
     * @var ?string
     */
    private $whoReceives;
    /**
     * @var ?string
     */
    private $receives_identification_number;

    /**
     * @var ?string
     */
    private $description;

    /**
     * @var ?int
     */
    private $shippingAgentId;

    /**
     * @var ?int
     */
    private $guideNumber;

    /**
     * @var ?int
     */
    private $discount;

    /**
     * @var ?boolean
     */
    private $is_tax;

    /**
     * @var ?double
     */
    private $commission;

    /**
     * @var ?double
     */
    private $shipping_cost;

    /**
     * @var ?string
     */
    private $payment_methods;

    /**
     * @var ?boolean
     */
    private $is_reserved;

    /**
     * @var ?int
     */
    private $order_number;

    /**
     * @var ?int
     */
    private $payment_gateway_agent_id;

    /**
     * @return int|null
     */
    public function getPaymentGatewayAgentId(): ?int
    {
        return $this->payment_gateway_agent_id;
    }

    /**
     * @param int|null $payment_gateway_agent_id
     */
    public function setPaymentGatewayAgentId(?int $payment_gateway_agent_id): void
    {
        $this->payment_gateway_agent_id = $payment_gateway_agent_id;
    }

    /**
     * @return int|null
     */
    public function getOrderNumber(): ?int
    {
        return $this->order_number;
    }

    /**
     * @param int|null $order_number
     */
    public function setOrderNumber(?int $order_number): void
    {
        $this->order_number = $order_number;
    }

    /**
     * @return string|null
     */
    public function getPaymentMethods(): ?string
    {
        return $this->payment_methods;
    }

    /**
     * @param string|null $payment_methods
     */
    public function setPaymentMethods(?string $payment_methods): void
    {
        $this->payment_methods = $payment_methods;
    }

    /**
     * @return bool|null
     */
    public function getIsReserved(): ?bool
    {
        return $this->is_reserved;
    }

    /**
     * @param bool|null $is_reserved
     */
    public function setIsReserved(?bool $is_reserved): void
    {
        $this->is_reserved = $is_reserved;
    }




    /**
     * @return float|null
     */
    public function getCommission(): ?float
    {
        return $this->commission;
    }

    /**
     * @param float|null $comission
     */
    public function setCommission(?float $commission): void
    {
        $this->commission = $commission;
    }

    /**
     * @return float|null
     */
    public function getShippingCost(): ?float
    {
        return $this->shipping_cost;
    }

    /**
     * @param float|null $shipping_cost
     */
    public function setShippingCost(?float $shipping_cost): void
    {
        $this->shipping_cost = $shipping_cost;
    }

    /**
     * @return bool|null
     */
    public function getIsTax(): ?bool
    {
        return $this->is_tax;
    }

    /**
     * @param bool|null $is_fax
     */
    public function setIsTax(?bool $is_fax): void
    {
        $this->is_tax = $is_fax;
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
    public function getGuideNumber(): ?int
    {
        return $this->guideNumber;
    }

    /**
     * @param int|null $guideNumber
     */
    public function setGuideNumber(?int $guideNumber): void
    {
        $this->guideNumber = $guideNumber;
    }

    /**
     * @return int|null
     */
    public function getShippingAgentId(): ?int
    {
        return $this->shippingAgentId;
    }

    /**
     * @param int|null $shippingAgentId
     */
    public function setShippingAgentId(?int $shippingAgentId): void
    {
        $this->shippingAgentId = $shippingAgentId;
    }



    /**
     * @return int|null
     */
    public function getStoresId(): ?int
    {
        return $this->storesId;
    }

    /**
     * @param int|null $id
     * @return GetOrderRequestDTO
     */
    public function setStoresId(?int $id): GetOrderRequestDTO
    {
        $this->storesId = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     * @return GetOrderRequestDTO
     */
    public function setUserId(?int $userId): GetOrderRequestDTO
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    /**
     * @param int|null $clientId
     * @return GetOrderRequestDTO
     */
    public function setClientId(?int $clientId): GetOrderRequestDTO
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhone(): ?int
    {
        return $this->phone;
    }

    /**
     * @param int|null $phone
     * @return GetOrderRequestDTO
     */
    public function setPhone(?int $phone): GetOrderRequestDTO
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return ListProductGetOrderDTO|array
     */
    public function getListProduct()
    {
        return $this->listProduct;
    }

    /**
     * @param ListProductGetOrderDTO|array $listProduct
     * @return GetOrderRequestDTO
     */
    public function setListProduct(array $listProduct): GetOrderRequestDTO
    {
        $this->listProduct = $listProduct;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return GetOrderRequestDTO
     */
    public function setAddress(?string $address): GetOrderRequestDTO
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMunicipalityId(): ?int
    {
        return $this->municipalityId;
    }

    /**
     * @param int|null $municipalityId
     * @return GetOrderRequestDTO
     */
    public function setMunicipalityId(?int $municipalityId): GetOrderRequestDTO
    {
        $this->municipalityId = $municipalityId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDepartmentId(): ?int
    {
        return $this->departmentId;
    }

    /**
     * @param int|null $departmentId
     * @return GetOrderRequestDTO
     */
    public function setDepartmentId(?int $departmentId): GetOrderRequestDTO
    {
        $this->departmentId = $departmentId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getWhoReceives(): ?string
    {
        return $this->whoReceives;
    }
    /**
     * @return int|null
     */
    public function getReceives_identification_number(): ?int
    {
        return $this->receives_identification_number;
    }

    /**
     * @param string|null $whoReceives
     * @return GetOrderRequestDTO
     */
    public function setWhoReceives(?string $whoReceives): GetOrderRequestDTO
    {
        $this->whoReceives = $whoReceives;
        return $this;
    }

    /**
     * @param int|null $receives_identification_number
     * @return GetOrderRequestDTO
     */
    public function setReceives_identification_number(?int $receives_identification_number): GetOrderRequestDTO
    {
        $this->receives_identification_number = $receives_identification_number;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return GetOrderRequestDTO
     */
    public function setDescription(?string $description): GetOrderRequestDTO
    {
        $this->description = $description;
        return $this;
    }

}
