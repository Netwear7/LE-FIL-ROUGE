<?php

include_once('../Interfaces/InterfaceDao.php');

class ServiceCommun{
    
    private $dataAccessObject;

    public function __construct(InterfaceDao $dao){
        $this->dataAccessObject = $dao;
    }

    /**
     * Get the value of dataAccessObject
     */ 
    public function getDataAccessObject(){
        return $this->dataAccessObject;
    }
}
?>