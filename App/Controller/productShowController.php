<?php
require "../UTILS/DatabaseUtils.php";
require "../Model/Entry.php";

$obj = new DatabaseUtils();
$handler = $obj->connect();

$myQuery = $handler->query("
SELECT 
    product.ID AS productID,
    `SKU`,
    `productName`,
    CONCAT(`price`, ' $') AS price,
    `DVDID`, 
    `BookID`,
    `FurnitureID`,
    CASE
        WHEN `product`.`DVDID` IS NOT NULL THEN CONCAT('Size: ', `dvd`.`MB`, ' MB')
        WHEN
            `product`.`FurnitureID` IS NOT NULL
        THEN
            CONCAT('Dimension: ',
                    `furniture`.`furHeight`,
                    'x',
                    `furniture`.`furWidth`,
                    'x',
                    `furniture`.`furLength`)
        ELSE CONCAT('Weight: ',
                `book`.`KG`,
                ' KG')
    END AS info
FROM
     `product`
        LEFT JOIN
         `dvd` ON  `product`.`DVDID` =  `dvd`.`ID`
        LEFT JOIN
        `furniture` ON  `product`.`FurnitureID` = `furniture`.`ID`
        LEFT JOIN
        `book` ON  `product`.`BookID` = `book`.`ID`");


$myQuery->setFetchMode(PDO::FETCH_CLASS, 'Entry');
$arr = array();
while($r = $myQuery->fetch()) {
  array_push($arr, $r);
}

echo json_encode($arr);


