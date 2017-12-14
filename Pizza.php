<?php
/**
 * Created by PhpStorm.
 * User: rv_000
 * Date: 07.12.2017
 * Time: 19:02
 */

/**
 * Class Pizza
 * @property string $name
 * @property string $description
 * @property float $price
 * @property Ingridients[] $aIngridients
 *
 */
class Pizza extends Object
{
    private $aIng = [];

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
        return null;
    }

    /**
     * @return Ingridients[]
     */
    public function getAIngridients()
    {
        return $this->aIng;
    }

    /**
     * @param Ingridients $aIngridients
     * @return $this
     */
    public function addtIngridient($aIngridients)
    {
        $this->aIng[] = $aIngridients;
        return $this;
    }



}