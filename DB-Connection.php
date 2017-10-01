<?php

namespace App;
use PDO;
use PDOException;


class Connection
{
    protected $conn;
    private $user="root";
    private  $pass="";

    public function __construct()
    {
        try{

            $this->conn = new PDO('mysql:host=localhost;dbname=mydatabase', $this->user, $this->pass);

        }catch(PDOException $e){

            print "Error!: ". $e->getMessage(). "<br>";
            die();

        }
    }
}
