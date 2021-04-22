<?php

require "../UTILS/DatabaseUtils.php";
require "../Model/Product.php";
require "../Model/Furniture.php";


//echo 'this is from productAdd controller from backend';
$obj = new DatabaseUtils();
$handler = $obj->connect();

$obj = new Furniture(null, $_POST['SKU'], $_POST['productName'], (float)$_POST['price'], null, (float)$_POST['furHeight'], (float)$_POST['furWidth'], (float)$_POST['furLength']);
$statement = $handler->prepare("INSERT INTO `furniture` (`furHeight`, `furWidth`, `furLength`) VALUES(:furHeight, :furWidth, :furLength)");
$statement->bindValue(':furHeight', $obj->getFurHeight(), PDO::PARAM_STR);
$statement->bindValue(':furWidth', $obj->getFunWidth(), PDO::PARAM_STR);
$statement->bindValue(':furLength', $obj->getFurLength(), PDO::PARAM_STR);
$statement->execute();

$obj->setFurnitureID($handler->lastInsertId());

$statement = $handler->prepare("INSERT INTO `product`(`SKU`, `productName`, `price`, `FurnitureID`) VALUES(:SKU, :productName, :price, :FurnitureID)");
$statement->bindValue(':SKU', $obj->getSKU(), PDO::PARAM_STR);
$statement->bindValue(':productName', $obj->getProductName(), PDO::PARAM_STR);
$statement->bindValue(':price', $obj->getPrice(), PDO::PARAM_STR);
$statement->bindValue(':FurnitureID', $obj->getFurnitureID(), PDO::PARAM_INT);
$statement->execute();
echo 'success';