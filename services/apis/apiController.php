<?php
abstract class apiController
{
    protected $model;
    protected $view;

    private $data;

    function __construct()
    {
        $this->data = file_get_contents("php://input"); 
    }
    
    function getData(){ 
        return json_decode($this->data); 
    }  

}