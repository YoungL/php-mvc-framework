<?php

class modelEngine {
  
    protected $db;

    function __construct($db) {
        require_once("system/library/model.php");
        $this->db = $db;
    }

    function load($file,$array=array()) {
        include ("model/" . $file . ".php");
        $model = $file . "_model";
        $this->$file = new $model($array,$this->db);
    }
}
