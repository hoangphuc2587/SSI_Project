<?php

class Database {

    private $pdo;
    private $host, $username, $password, $database;

    /**
     * Creates the mysql connection.
     * Kills the script on connection or database errors.
     * 
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $database
     * @return boolean
     */
    public function __construct($host, $username, $password, $database){
        $this->host        = $host;
        $this->username    = $username;
        $this->password    = $password;
        $this->database    = $database;

        try {
                $dsn = "mysql:host=".$this->host.";dbname=".$this->database;
                $options = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                ); 

                $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
            }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
            $this->pdo = null;
        }
      
        return true;
    }


    /**
     * On error returns an array with the error code.
     * On success returns an array with multiple mysql data.
     * 
     * @param string $query
     * @return array
     */
    public function query($query) {
        /* array returned, includes a success boolean */
        $return = array();
        if(!$result = $this->pdo->query($query))
        {
            $return['success'] = false;
            $return['error'] = $this->pdo->errorInfo()[2];
            return $return;
        }

        $return['success'] = true;

        $return['count'] = $result->rowCount();
        $return['rows'] = array();
        /* fetch associative array */
        while ($row = $result->fetch()) {
            $return['rows'][] = $row;
        }

        return $return;
    }

    /**
     * On error return false
     * On success update date and return true
     * 
     * @param string $query
     * @return array
     */
    public function update($query) {
      
        $return = mysqli_query($this->mysqli, $query);
        return $return;
    }

    /**
     * On error return false
     * On success update database and return true
     * 
     * @param string $query
     * @return true/false
     */
    public function execute($query) {
      
        $return = mysqli_query($this->mysqli, $query);
        return $return;
    }

    /**
     * Automatically closes the mysql connection
     * at the end of the program.
     */
    public function __destruct() {
       $this->pdo = null;
         
    }
    // public function countPage($query) {
    //     // $result = mysqli_query($this->mysqli, $query);
    //     // $row = mysqli_fetch_assoc($result);
    //     // $total_records = $row["total"];
    //     // return $total_records;
        
    //     $result = $this->db->query("SELECT COUNT(*) AS COUNT_USER FROM LOGIN WHERE USER_ID ='".$userId."' AND DELETE_FLAG = 0");
    //     if($result['success'] == true && $result['count'] > 0)
    //     {
    //         $data =  $result['rows'][0];
    //         $count = $data['COUNT_USER'];
    //         if($count != '0'){
    //             $isExist = true;
    //         }
    //     }
    //     return $isExist;
    // }
}