<?php

class MysqlConnect
{
    function __construct()
    {

        header("Access-Control-Allow-Origin:  * ");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE ");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization ");
        header("Content-Type: application/json; charset=UTF-8");
    }

    public  function Connect($host, $username, $pass, $databasename)
    {


        $conn = new PDO("mysql:host=$host;dbname=$databasename;charset=UTF8", $username, $pass);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}
