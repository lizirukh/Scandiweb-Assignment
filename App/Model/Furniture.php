<?php


class Furniture extends Product
{
    private $FurnitureID, $furHeight, $funWidth, $furLength;

    /**
     * Furniture constructor.
     * @param $FurnitureID
     * @param $furHeight
     * @param $funWidth
     * @param $furLength
     */
    public function __construct($ID, $SKU, $productName, $price, $FurnitureID, $furHeight, $funWidth, $furLength)
    {
        $this->FurnitureID = $FurnitureID;
        $this->furHeight = $furHeight;
        $this->funWidth = $funWidth;
        $this->furLength = $furLength;
        parent::__construct($ID, $SKU, $productName, $price);
    }


    /**
     * @return mixed
     */
    public function getFurnitureID()
    {
        return $this->FurnitureID;
    }

    /**
     * @param mixed $FurnitureID
     */
    public function setFurnitureID($FurnitureID)
    {
        $this->FurnitureID = $FurnitureID;
    }

    /**
     * @return mixed
     */
    public function getFurHeight()
    {
        return $this->furHeight;
    }

    /**
     * @param mixed $furHeight
     */
    public function setFurHeight($furHeight)
    {
        $this->furHeight = $furHeight;
    }

    /**
     * @return mixed
     */
    public function getFunWidth()
    {
        return $this->funWidth;
    }

    /**
     * @param mixed $funWidth
     */
    public function setFunWidth($funWidth)
    {
        $this->funWidth = $funWidth;
    }

    /**
     * @return mixed
     */
    public function getFurLength()
    {
        return $this->furLength;
    }

    /**
     * @param mixed $furLength
     */
    public function setFurLength($furLength)
    {
        $this->furLength = $furLength;
    }


}