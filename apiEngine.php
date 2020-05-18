<?php
    class apiEngine{
    private $method;
    private $value;

    public function __construct($value,$method){
        $this->value = stripcslashes($value);
        $this->method = explode('_',$method);
        //$this->$value = explode('_',$value);
    }

    static function getApiByName($apiName){
        require_once $apiName.'.php';
        $apiClass = new $apiName();
        return $apiClass;
    }

    function callApi(){
        $apiName = $this ->method[0];
        if(file_exists($apiName.'.php')){
            $apiClass = self::getApiByName($this->method[0]);
            $apiReflection = new ReflectionClass($apiName);
            $methodName = $apiReflection -> getMethod($this ->method[1]);
            if($methodName != null){
                $funcName = $this -> method[1];
                return $apiClass -> $funcName($this->value);
            }

        }
    }
}//fuck git
