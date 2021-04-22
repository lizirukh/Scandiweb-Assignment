<?php

class DatabaseUtils
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    public function connect()
    {
        $this->servername = '127.0.0.1';
        $this->username = 'root';
        $this->password = 'Worakls2018';
        $this->dbname = 'productdb';
        $this->charset = 'utf8mb4';

        try {
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}

/*
 create database productdb;

create table productdb.DVD(
  ID int primary key auto_increment,
  MB float not null
);

create table productdb.Book(
  ID int primary key auto_increment,
  KG float not null
);

create table productdb.Furniture(
  ID int primary key auto_increment,
  furHeight float not null,
  furWidth float not null,
  furLength float not null
);

create table productdb.Product(
ID int primary key auto_increment,
SKU varchar(50) not null,
productName varchar(50) not null,
price float not null,
DVDID int,
BookID int,
FurnitureID int,
CONSTRAINT FK_Product_DVD FOREIGN KEY (DVDID)  REFERENCES productdb.DVD(ID),
CONSTRAINT FK_Product_Book FOREIGN KEY (BookID)  REFERENCES productdb.Book(ID),
CONSTRAINT FK_Product_Furniture FOREIGN KEY (FurnitureID)  REFERENCES productdb.Furniture(ID)
);

 */