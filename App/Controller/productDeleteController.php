<?php
require "../UTILS/DatabaseUtils.php";

$obj = new DatabaseUtils();
$handler = $obj->connect();

$productIDArray = $_POST['productIDArray'];
$DVDIDArray = $_POST['DVDIDArray'];
$BookIDArray = $_POST['BookIDArray'];
$FurnitureIDArray = $_POST['FurnitureIDArray'];

$sqlHelper = "DELETE from `product` WHERE `ID` IN (".join(", ", $productIDArray).")";
$statement = $handler->prepare($sqlHelper);
$statement->execute();

if (!empty($DVDIDArray)) {
    $sqlHelper = "DELETE from `dvd` WHERE `ID` IN (".join(", ", $DVDIDArray).")";
    $statement = $handler->prepare($sqlHelper);
    $statement->execute();
}
if (!empty($BookIDArray)) {
    $sqlHelper = "DELETE from `book` WHERE `ID` IN (".join(", ", $BookIDArray).")";
    $statement = $handler->prepare($sqlHelper);
    $statement->execute();
}
if (!empty($FurnitureIDArray)) {
    $sqlHelper = "DELETE from `furniture` WHERE `ID` IN (".join(", ", $FurnitureIDArray).")";
    $statement = $handler->prepare($sqlHelper);
    $statement->execute();
}
echo 'Success';
//echo $sqlHelper;
//print_r($productIDArray);

/*


echo 'This is response from productDeleteController!';
*/

