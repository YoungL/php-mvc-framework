<?php

class errorpage extends controller {

    public function index() {

    }

    public function e404() {
        header("HTTP/1.1 404 Not Found");
        $this->view->load("errorpage/e404");
    }
}
