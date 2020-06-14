<?php

namespace app\models;

class OrderPosition extends Model
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
  public function getOrderId()
  {
    return $this->order_id;
  }
  public function getProductAmount()
  {
    return $this->product_amount;
  }

  public function setProductAmount($product_amount)
  { 
    $this->product_amount = $product_amount;
    return $this;
  }

  public static function getTableName(): string
  {
    return "order_positions";
  } 

  public function getProductId()
  {
    return $this->product_id;
  }

}
