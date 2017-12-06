<?php
/**
 * Created by PhpStorm.
 * User: anonymous
 * Date: 12/2/2017
 * Time: 12:53 PM
 */

/**
 * Class Pizza
 * @property string $name
 * @property string $description
 * @property Ingridients[] $Ingridients
 * @property $price
 *
 */
class Pizza extends Object
{

    private $aIng= [];

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->getValueFromParams('name');
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function setName($name): Pizza
    {
        return $this->setValueForParam('name',$name);
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return Ingridients[]
     */
    public function getIngridients(): array
    {
        return $this->aIng;
    }

    /**
     * @param Ingridients $oIngr
     */
    public function addIngridient($oIngr)
    {
        $this->aIng[] = $oIngr;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        $price = 0;
        foreach ($this->Ingridients as $item) {
            $price += $item->price;
        }
        return $price;
    }





}