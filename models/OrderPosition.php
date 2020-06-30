<?php

namespace app\models;

class OrderPosition extends Record
{
  protected $order_id;
  protected $product_id;
  protected $product_amount;

  public function __construct(
    $order_id = null,
    $product_id = null,
    $product_amount = null
  ) {
    parent::__construct();
    $this->order_id = $order_id;
    $this->product_id = $product_id;
    $this->product_amount = $product_amount;
  }

  public static function getTableName(): string
  {
    return "order_positions";
  }

  public function getOrder(): Order
  {
    return Order::getById($this->order_id);
  }

  public function getAmount()
  {
    return $this->product_amount;
  }

  public function setAmount($product_amount): OrderPosition
  {
    $this->product_amount = $product_amount;
    return $this;
  }

  public function getProduct(): Product
  {
    return Product::getById($this->product_id);
  }
}
