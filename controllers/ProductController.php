<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{

  public function actionIndex()
  {
    echo $this->render(
      "catalog",
      ["products" => Product::getAll()]
    );
  }

  public function actionCard()
  {
    $id = $_GET['id'];
    $model = Product::getById($id);
    echo $this->render(
      'product_card',
      ['model' => $model]
    );
  }
}
