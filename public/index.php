<pre>
<?php

// use app\models\Product;
use app\models\Order;

require __DIR__ . "/../config/main.php";
require ROOT_DIR . "services/Autoloader.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

// // $product = app\models\Product::getById(1);
// // $product->setPrice(300); 
// // $product->update();

// // $prod = new \app\models\Product("Молоко", 2, "Молоко 2.5%", 150);
// // $prod->save();

// // var_dump($prod);

// // $order = app\models\Order::getById(9);
// // var_dump($order);
// // $user = app\models\User::getById($order->getUserId());
// // var_dump($user);

// // $sran = app\models\Product::getById(7);
// // $sran->delete();
// $p = Product::getById(5);
// $order = Order::getById(9);
// $order->addProduct($p->getId(), 10);
// // $op = new \app\models\OrderProducts($p, 10);
// var_dump($op);
// // $op->save();

$order = Order::getById(9);
$order->setProductAmount(2, 22);
