<?php

namespace app\models;

class OrderStatus extends Record
{
  protected $name;
  
  public function __construct($name = null)
  {
    parent::__construct();
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name): OrderStatus
  {
    $this->name = $name;
    return $this;
  }

  public static function getTableName(): string
  {
    return "order_statuses";
  }
}
