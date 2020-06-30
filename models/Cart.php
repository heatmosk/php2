<?php

namespace app\models;

use app\models\User;
use app\models\CartPosition;

class Cart extends Record
{
  protected $user_id;

  public function __construct($user_id = null)
  {
    parent::__construct();
    $this->user_id = $user_id;
  }

  public static function getTableName(): string
  {
    return "carts";
  }

  public function getUser(): User
  {
    return User::getById($this->user_id);
  }

  public function setUser(User $user): Cart
  {
    $this->user_id = $user->getId();
    return $this;
  }

  public function setStatus(OrderStatus $status): Cart
  {
    $this->status_id = $status->getId();
    return $this;
  }

  public function addProduct(Product $addingProduct, $amount): Cart
  {
    if ($this->id === null) {
      $this->save();
    }
    $allProducts = $this->getAllPositions();

    foreach ($allProducts as $productPosition) {
      if ($productPosition->getProduct()->getId() === $addingProduct->getId()) {
        $position = $productPosition;
        $position->setAmount($position->getAmount() + $amount);
        $position->save();
        break;
      }
    }

    if ($position === null) {
      $position = new CartPosition($this->id, $addingProduct->getId(), $amount);
      $position->save();
    }
    return $this;
  }

  public function getAllPositions(): array
  {
    $allProducts = CartPosition::getAll();
    $result = [];
    foreach ($allProducts as $product) {
      if ($product->getCart()->getId() === $this->id) {
        $result[] = $product;
      }
    }
    return $result;
  }
  public static function getCartByUser(User $user)
  {
    $carts = static::getAll();
    foreach ($carts as $cart) {
      if ($cart->getUser()->getId() === $user->getId()) {
        return $cart;
      }
    }
    return false;
  }
  public function getTotalCost()
  {
    $positions = $this->getAllPositions();
    $result = 0;
    foreach ($positions as $position) {
      $result += $position->getProduct()->getPrice() * $position->getAmount();
    }
    return $result;
  }
}
