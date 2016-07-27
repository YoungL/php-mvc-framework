<?php

class indexClass {

    private $db;
    private $controller;
    private $template;
    private $model;

    function __construct() {
        //Require our model, view and controller libraries
        require_once("system/library/template.php");
        require_once("system/library/controller.php");
        require_once("system/library/model_loader.php");

        $this->db = new mysqli("localhost","root","pa55word","builds","8889");

        if ($this->db->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $this->template = new templateEngine();
        $this->model = new modelEngine($this->db);
    }

    public function myMain() {
        if (strlen(current(array_keys($_GET))) > 0) {
            $this->loadPage(current(array_keys($_GET)));
        }
        else {
            $this->loadPage("/home");
        }
    }

    private function loadPage($page) {
        if (substr($page,0,1) != "/") {
            $page = "/" . $page;
        }
        $pages = explode("/",$page);

        if (file_exists("controller/" . $pages[1] . ".php")) {
            require_once("controller/" . $pages[1] . ".php");
            $array = array("db"=>$this->db, "template"=>$this->template, "model"=>$this->model);
            $this->controller = new $pages[1]($array);

            if (strlen($pages[2]) > 0) {
                if (strlen ($pages[3]) > 0) {
                    $this->controller->$pages[2]($pages[3]);
                }
                else {
                    $this->controller->$pages[2]();
                }
            }
            else {
                $this->controller->index();
            }
        }
        else {
            $this->loadPage("errorpage/e404");
        }
    }
}

$main = new indexClass();
$main->myMain();
