<?php

class Cart
{
  private $products;

  public function __construct()
  {
    $this->products = [];
  }

  public function addProduct(Product $product)
  {
    $prodId = $product->getId();
    if (!isset($this->products[$prodId])) {
      $this->products[$prodId] = [
        "amount" => 0,
        "cost" => $product->getCost()
      ];
    }
    $this->products[$prodId]["amount"]++;
  }

  public function removeProduct(Product $product)
  {
    $prodId = $product->getId();
    if (isset($this->products[$prodId])) {
      $this->products[$prodId]["amount"]--;
    }
    if ($this->products[$prodId]["amount"] <= 0) {
      unset($this->products[$prodId]);
    }
  }

  public function getProducts()
  {
    return $this->products;
  }

  public function getTotalCost()
  {
    $cost = 0.0;
    foreach ($this->products as $productId => $product) {
      $cost += $product["amount"] * $product["cost"];
    }
    return $cost;
  }
}

class Product
{
  private $ID;
  private $name;
  private $cost;

  public function __construct(int $ID, string $name, float $cost)
  {
    $this->ID = (int) $ID;
    $this->name = $name;
    $this->cost = $cost;
  }

  public function getId()
  {
    return $this->ID;
  }

  public function getCost()
  {
    return $this->cost;
  }

  public function getName()
  {
    return $this->name;
  }
}


class A
{
  public function foo()
  {
    static $x = 0;
    echo ++$x;
  }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();
