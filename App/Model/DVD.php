<?php


class DVD extends Product
{
    private $DVDID, $MB;

    /**
     * DVD constructor.
     * @param $DVDID
     * @param $MB
     */
    public function __construct($ID, $SKU, $productName, $price, $DVDID, $MB)
    {

        $this->DVDID = $DVDID;
        $this->MB = $MB;
        parent::__construct($ID, $SKU, $productName, $price);
    }


    /**
     * @return mixed
     */
    public function getDVDID()
    {
        return $this->DVDID;
    }

    /**
     * @param mixed $DVDID
     */
    public function setDVDID($DVDID)
    {
        $this->DVDID = $DVDID;
    }

    /**
     * @return mixed
     */
    public function getMB()
    {
        return $this->MB;
    }

    /**
     * @param mixed $MB
     */
    public function setMB($MB)
    {
        $this->MB = $MB;
    }


}