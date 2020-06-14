<?php

namespace app\models;

class OrderStatus extends Model
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

  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  public static function getTableName(): string
  {
    return "order_statuses";
  }
}
