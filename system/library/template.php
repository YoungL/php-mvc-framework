<?php

class templateEngine {

    function load($file, $data) {

        foreach ($data as $key => $value) {
            $$key = $value;
        }
        
        include ("view/" . $file . ".php");
    }
}
