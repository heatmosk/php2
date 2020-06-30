<?php


namespace app\controllers;

use app\models\Session;
use app\models\Cart;
use app\models\Product;
use app\models\User;

class CartController extends Controller
{
  public function actionAdd()
  {
    $user = User::getById(Session::Get("user_id"));
    $cart = Cart::getCartByUser($user);
    if (empty($cart)) {
      $cart = new Cart($user->getId());
    }
    $product = Product::getById($_POST["product_id"]);
    $cart->addProduct($product, 1);
    header("location: /index.php?a=view&c=cart");
  }

  public function actionRemove()
  {
    $user = User::getById(Session::Get("user_id"));
    $cart = Cart::getCartByUser($user);
    if (empty($cart)) {
      $cart = new Cart($user->getId());
    }
    $product = Product::getById($_POST["product_id"]);
    $cart->addProduct($product, -1);
    header("location: /index.php?a=view&c=cart");
  }

  public function actionView()
  {
    $user = User::getById(Session::Get("user_id"));
    $cart = Cart::getCartByUser($user);
    echo $this->render("cart", ["cart" => $cart]);
  }
}
