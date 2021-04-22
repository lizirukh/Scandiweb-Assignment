<?php

require "../UTILS/DatabaseUtils.php";
require "../Model/Product.php";
require "../Model/Book.php";



//echo 'this is from productAdd controller from backend';
$obj = new DatabaseUtils();
$handler = $obj->connect();


$obj = new Book(null, $_POST['SKU'], $_POST['productName'], (float)$_POST['price'], null, (float)$_POST['KG']);
$statement = $handler->prepare("INSERT INTO `book` (`KG`) VALUES(:KG)");
$statement->bindValue(':KG', $obj->getKG(), PDO::PARAM_STR);
$statement->execute();

$obj->setBookID($handler->lastInsertId());

$statement = $handler->prepare("INSERT INTO `product`(`SKU`, `productName`, `price`, `BookID`) VALUES(:SKU, :productName, :price, :BookID)");
$statement->bindValue(':SKU', $obj->getSKU(), PDO::PARAM_STR);
$statement->bindValue(':productName', $obj->getProductName(), PDO::PARAM_STR);
$statement->bindValue(':price', $obj->getPrice(), PDO::PARAM_STR);
$statement->bindValue(':BookID', $obj->getBookID(), PDO::PARAM_INT);
$statement->execute();
echo 'success';