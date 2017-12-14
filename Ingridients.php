<?php
/**
 * Created by PhpStorm.
 * User: rv_000
 * Date: 07.12.2017
 * Time: 19:05
 */

/**
 * Class Ingridients
 * @property string $name
 * @property string $description
 * @property float $price
 */
class Ingridients extends Object
{

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getValueFromParams('name');
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->setValueForParam('name',$name);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getValueFromParams('description');
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->setValueForParam('description',$description);
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->getValueFromParams('price');
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->setValueForParam('price',$price);
    }



    static public function makeIngridients($aIng){
        $aRes = [];
        foreach ($aIng as $item) {
            $aRes[] = new Ingridients($item);
        }

        return $aRes;
    }

}