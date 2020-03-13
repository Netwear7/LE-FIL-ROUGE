<?php


class ServiceCommun{
    private $dataAccessObject;

    public function __construct( $dao){
        $this->dataAccessObject = $dao;

    }

    /**
     * Get the value of dataAccessObject
     */ 
    public function getDataAccessObject()
    {
        return $this->dataAccessObject;
    }
}



?>