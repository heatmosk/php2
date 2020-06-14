<?php

namespace app\models;


class Product extends Model
{
  protected $category_id;
  protected $name;
  protected $description;
  protected $price;

  public function __construct(
    $name = null,
    $category_id = null,
    $description = null,
    $price = null
  ) {
    parent::__construct();
    $this->name = $name;
    $this->category_id = $category_id;
    $this->description = $description;
    $this->price = $price;
  }

  public static function getTableName(): string
  {
    return "products";
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
  
  public function getCategoryId()
  {
    return $this->category_id;
  }
  
  public function setCategoryId($category_id)
  {
    $this->category_id = $category_id;

    return $this;
  }
  
  public function getDescription()
  {
    return $this->description;
  }
  
  public function setDescription($description)
  {
    $this->description = $description;

    return $this;
  } 

  public function getPrice()
  {
    return $this->price;
  }
  
  public function setPrice($price)
  {
    $this->price = $price;

    return $this;
  }

  public function save()
  {
    return parent::save();
  }
}
