<?php

namespace app\models;


class Product extends Record
{
  protected $name;
  protected $category_id;
  protected $description;
  protected $price;

  public function __construct($name = null, $category_id = null, $description = null, $price = null)
  {
    parent::__construct();
    $this->name = $name;
    $this->category_id = $category_id;
    $this->description = $description;
    $this->price = $price;
  }


  public function getName()
  {
    return $this->name;
  }

  public function setName($name): Product
  {
    $this->name = $name;
    return $this;
  }

  public function getCategory()
  {
    return ProductCategory::getById($this->category_id);
  }

  public function setCategor(ProductCategory $category): Product
  {
    $this->category_id = $category->getId();
    return $this;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description): Product
  {
    $this->description = $description;
    return $this;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function setPrice($price): Product
  {
    $this->price = $price;

    return $this;
  }

  public static function getTableName(): string
  {
    return "products";
  }
}
