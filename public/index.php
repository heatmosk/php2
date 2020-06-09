 
<?php
require __DIR__ . "/../services/Autoloader.php";

spl_autoload_register([new services\Autoloader(), 'loadClass']);

$product = new models\Product();
$product->setCategoryId(1)->setDescription("");
