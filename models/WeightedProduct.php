<?php

namespace models;

class WeightedProduct extends Product
{
  protected $weight = 0.0;
  public function __construct(float $weight = 0)
  {
    $this->weight = $weight;
  }
  public function getPrice()
  {
    return $this->price * $this->weight;
  }
  public function setWeight(float $weight)
  {
    $this->weight = $weight;
    return $this;
  }
}
