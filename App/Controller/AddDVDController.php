<?php

require "../UTILS/DatabaseUtils.php";
require "../Model/Product.php";
require "../Model/DVD.php";


//echo 'this is from productAdd controller from backend';
$obj = new DatabaseUtils();
$handler = $obj->connect();

$obj = new DVD(null, $_POST['SKU'], $_POST['productName'], (float)$_POST['price'], null, (float)$_POST['MB']);
$statement = $handler->prepare("INSERT INTO `dvd` (`MB`) VALUES(:MB)");
$statement->bindValue(':MB', $obj->getMB(), PDO::PARAM_STR);
$statement->execute();

$obj->setDVDID($handler->lastInsertId());

$statement = $handler->prepare("INSERT INTO `product`(`SKU`, `productName`, `price`, `DVDID`) VALUES(:SKU, :productName, :price, :DVDID)");
$statement->bindValue(':SKU', $obj->getSKU(), PDO::PARAM_STR);
$statement->bindValue(':productName', $obj->getProductName(), PDO::PARAM_STR);
$statement->bindValue(':price', $obj->getPrice(), PDO::PARAM_STR);
$statement->bindValue(':DVDID', $obj->getDVDID(), PDO::PARAM_INT);
$statement->execute();
echo 'success';