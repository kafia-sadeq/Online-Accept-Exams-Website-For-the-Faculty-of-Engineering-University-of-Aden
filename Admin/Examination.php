<?php

class Examination{
    var $host;
    var $username;
    var $password;
    var $database;
    var $connct;
    var $home_page;
    var $query;
    var $data;
    var $statement;
    var $filedata;

    function __construct()
    {
       $this->host='localhost';
       $his->username='root';
       $his->password='';
       $his->database='online_examination';
       $his->connct =new PDO("mysql:host=$this->host; dbname=$his->database","$his->username"," $his->password");
       echo "Hello";
       session_start();
    }
    function  execute_query()
    {
        $this->$statement=$this->connct->prepare($this->query);
        $this->$statement->execute($this->data);
    }
    function total_row()
    {
        $this->execute_query();
        return  $this->$statement->rowCount();
    }
}

?>