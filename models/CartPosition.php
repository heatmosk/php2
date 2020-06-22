<?php

namespace app\models;

class CartPosition extends Record
{
  protected $cart_id;
  protected $product_id;
  protected $product_amount;

  public function __construct(
    $cart_id = null,
    $product_id = null,
    $product_amount = null
  ) {
    parent::__construct();
    $this->cart_id = $cart_id;
    $this->product_id = $product_id;
    $this->product_amount = $product_amount;
  }

  public static function getTableName(): string
  {
    return "cart_products";
  }

  public function getCart(): Cart
  {
    return Cart::getById($this->cart_id);
  }
  
  public function getAmount()
  {
    return $this->product_amount;
  }

  public function setAmount($product_amount): CartPosition
  {
    $this->product_amount = $product_amount;
    return $this;
  }

  public function getProduct(): Product
  {
    return Product::getById($this->product_id);
  }
}
