<?php
include_once 'classes/database.php';

Class baseModel {

    protected $db;

    function __construct(){
        //Connect to DB
        $this->db = new Database("localhost", "test-ssi-user", "O~6HHX0)uVGb", "test-ssi-db");

    }

}

?>
