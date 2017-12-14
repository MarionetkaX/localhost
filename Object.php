<?php

/**
 * Class Object
 * @property $id
 */
abstract class Object{

    private $aParams =[];

    protected function getValueFromParams($param){
        return isset($this->aParams[$param])? $this->aParams[$param] : null;
    }

    /**
     * @param $param
     * @param $value
     * @return $this
     */
    protected function setValueForParam($param,$value){
        $this->aParams[$param] = $value;
        return $this;
    }

    public function __construct( $params = [])
    {
        $className = get_called_class();
        foreach ($params as $param_name => $param_value){
            if (property_exists($className, $param_name ))
                $this->$param_name = $param_value;
            elseif(method_exists($this,'set'.ucfirst($param_name) )){
                $name = 'set'.ucfirst($param_name);
                $this->$name($param_value);
            }

        }
    }

    public function __get($name)
    {
        $sFuncName = 'get'.ucfirst($name);
        if (method_exists($this,$sFuncName ))
            return $this->$sFuncName();

        return null;
    }

    /**
     * @param $name
     * @param $value
     * @return $this
     */
    public function __set($name,$value)
    {
        $sFuncName = 'set'.ucfirst($name);
        if (method_exists($this,$sFuncName ))
            $this->$sFuncName($value);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->getValueFromParams('id');
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setValueForParam('id',$id);
    }
}
