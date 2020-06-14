<?php

namespace app\models;

use app\models\User;
use app\models\Product;
use app\models\OrderProducts;

class Order extends Model
{
  protected $user_id;
  protected $status_id;

  public function __construct(
    $user_id = null,
    $status_id = null
  ) {
    parent::__construct();
    $this->user_id = $user_id;
    $this->status_id = $status_id;
  }

  public static function getTableName(): string
  {
    return "orders";
  }

  public function getUserId()
  {
    return $this->user_id;
  }

  public function setUserId($user_id)
  {
    $this->user_id = $user_id;
    return $this;
  }

  public function getStatusId()
  {
    return $this->status_id;
  }

  public function setStatusId($status_id)
  {
    $this->status_id = $status_id;
    return $this;
  }

  public function addProduct(int $product_id, $amount)
  {
    $op = new OrderPosition($this->id, $product_id, $amount);
    $op->save();
    return $this;
  }

  public function getAllPositions(): array
  {
    $allPositions = OrderPosition::getAll();
    $result = [];
    foreach ($allPositions as $position) {
      if ($position->getOrderId() === $this->id) {
        $result[] = $position;
      }
    }
    return $result;
  }

  public function setProductAmount(int $product_id, $amount)
  { 
    $orderPositions = $this->getAllPositions();
    foreach ($orderPositions as $orderPosition) {
      if ($orderPosition->getProductId() == $product_id) {
        $orderPosition->setProductAmount($amount);
        $orderPosition->save();
        return $this;
      }
    }
    return $this->addProduct($product_id, $amount);
  }

  public function getAllProducts(): array
  {
    $orderProducts = $this->getAllPositions();
    $result = [];
    foreach ($orderProducts as $orderProduct) {
      $result[] = Product::getById($orderProduct->getProductId());
    }
    return $result;
  }

  public function getUser(): User
  {
    return User::getById($this->user_id);
  }
}
