<?php

require_once 'namespaceDir1/level1/level2/level3/level4/level5/level6/Product.php';
require_once 'namespaceDir2/level1/level2/Product.php';

use namespace2\Product as ProductFromNamespace2;

$product = new namespace1\Product();
$product->viewProduct();

$product2 = new ProductFromNamespace2();
$product2->viewProduct();

?>