<?php

class controller{
    
    protected $db;
    protected $view;
    protected $model;
    
    function __construct($array)
    {
        if (isset($array["db"]))
        {
            $this->db = $array["db"];
        }
        if (isset($array["template"]))
        {
            $this->view = $array["template"];
        }
        if (isset($array["model"]))
        {
            $this->model = $array["model"];
        }
    }
    
    protected function isLoggedIn()
    {
        //Need to return true if loggedin and false if loggedout
        return true;
    }
}