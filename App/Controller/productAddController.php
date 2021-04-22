<?php
/*
require "../UTILS/DatabaseUtils.php";
require "../Model/Product.php";
require "../Model/DVD.php";
require "../Model/Furniture.php";
require "../Model/Book.php";

//echo 'this is from productAdd controller from backend';
$obj = new DatabaseUtils();
$handler = $obj->connect();

$typeSwitcher = $_POST['typeSwitcher'];
switch ($typeSwitcher) {
    case 'DVD':
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
        break;
    case 'Furniture':
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
        break;
    case 'Book':
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
        break;

}
*/