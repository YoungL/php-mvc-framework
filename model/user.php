<?php

class user_model extends model{

    function __construct($array,$db)
    {
        //The array variable can be used to set local member variables...
        parent::__construct($db); //this gives the model access to the database
    }
}

?>
