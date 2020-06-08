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
    //статическая переменная (общая для всех объектов класса) инициализируется со значением 0
    static $x = 0;
    echo ++$x;
  }
}
$a1 = new A();
$a2 = new A();

$a1->foo(); //$x инскрементируется (0 => 1) и выводится 1;
$a2->foo(); //$x инскрементируется (1 => 2) и выводится 2;
$a1->foo(); //$x инскрементируется (2 => 3) и выводится 3;
$a2->foo(); //$x инскрементируется (3 => 4) и выводится 4;

class B extends A {
}

/**
 *  В этом случае у объектов классов A и B будут статические переменные $x.
 * У объектов класса A своя статическая перменная, у объектов класса B - своя.
 * Поэтому это будет 2 разные перменные.
 * Вывод: 1 1 2 2 , но с учетом вызовов в предыдущем примере - 5 1 6 2
 */

$a1 = new A();
$b1 = new B();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();
