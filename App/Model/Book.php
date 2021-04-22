<?php


class Book extends Product
{
    private $BookID, $KG;

    /**
     * Book constructor.
     * @param $BookID
     * @param $KG
     */
    public function __construct($ID, $SKU, $productName, $price, $BookID, $KG)
    {
        $this->BookID = $BookID;
        $this->KG = $KG;
        parent::__construct($ID, $SKU, $productName, $price);
    }


    /**
     * @return mixed
     */
    public function getBookID()
    {
        return $this->BookID;
    }

    /**
     * @param mixed $BookID
     */
    public function setBookID($BookID)
    {
        $this->BookID = $BookID;
    }

    /**
     * @return mixed
     */
    public function getKG()
    {
        return $this->KG;
    }

    /**
     * @param mixed $KG
     */
    public function setKG($KG)
    {
        $this->KG = $KG;
    }




}