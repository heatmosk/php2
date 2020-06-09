<?php

namespace models;

class DigitProduct extends Product
{
  public function getPrice()
  {
    return $this->getPrice() / 2;
  }
}
