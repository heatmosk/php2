<?php

namespace app\models;

use app\models\User;
use app\models\Product;
use app\models\OrderPosition;

class Order extends Record
{
  protected $user_id;
  protected $status_id;

  public function __construct($user_id = null, $status_id = null)
  {
    parent::__construct();
    $this->user_id = $user_id;
    $this->status_id = $status_id;
  }

  public static function getTableName(): string
  {
    return "orders";
  }

  public function getUser(): User
  {
    return User::getById($this->user_id);
  }

  public function setUser(User $user): Order
  {
    $this->user_id = $user->getId();
    return $this;
  }

  public function getStatus()
  {
    return OrderStatus::getById($this->status_id);
  }

  public function setStatus(OrderStatus $status): Order
  {
    $this->status_id = $status->getId();
    return $this;
  }

  public function addPosition(OrderPosition $position): Order
  {
    $op = new OrderPosition(
      $this->id,
      $position->getProduct()->getId(),
      $position->getAmount()
    );
    $op->save();
    return $this;
  }

  public function getAllPositions(): array
  {
    $allPositions = OrderPosition::getAll();
    $result = [];
    foreach ($allPositions as $position) {
      if ($position->getOrder()->getId() === $this->id) {
        $result[] = $position;
      }
    }
    return $result;
  }
}
