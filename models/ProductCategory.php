<?php

namespace app\models;

class ProductCategory extends Record
{
  protected $name;

  public function __construct(string $name)
  {
    parent::__construct();
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name): ProductCategory
  {
    $this->name = $name;
    return $this;
  }

  public static function getTableName(): string
  {
    return "product_categories";
  }
}
