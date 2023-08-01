<?php
class Database{
    public $link;
    public function __construct() {
        $hostName="localhost";
        $serverName="root";
        $password="";
        $databaseName="librarymanagementsystem";
        $this->link= mysqli_connect($hostName, $serverName, $password, $databaseName);
        if($this->link){
            //echo"Database is connected";
        }
        else{
            echo"Database is not connected";
        }
    }
}
?>