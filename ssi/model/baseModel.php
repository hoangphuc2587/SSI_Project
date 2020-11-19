<?php
include_once 'classes/database.php';

Class baseModel {

    protected $db;

    function __construct(){
        //Connect to DB
        $this->db = new Database("localhost", "ssi-user", "sKuTmh2w!", "ssi-db");

    }

}

?>
