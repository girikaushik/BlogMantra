<?php

class database
{
    private $db = "blogmantra";
    private $username = "root";
    private $password = "";
    private $host = "localhost";
    // private $db = "blogmantra";
    // private $username = "root";
    // private $password = "123456789";
    // private $host = "blogmantra.cv4vf4gp4t8e.ap-south-1.rds.amazonaws.com";

    function connect()
    {
        $connection = mysqli_connect($this->host,$this->username,$this->password,$this->db);
        
        return $connection;
    }

    function read($query)
    {
        $con = $this->connect();

        $result = mysqli_query($con,$query);

        if(!$result)
        {
            echo "!!! DATABASE FAILED IN function read()";
            return false;
        }

        else
        {
            $data = false;
            while($row = mysqli_fetch_assoc($result))
            {
               $data[] = $row;
            }
            return $data; 
        }

    }

    function save($query)
    {
        $con = $this->connect();

        $result = mysqli_query($con,$query);

        if(!$result)
        {
            echo "!!! DATABASE FAILED IN function save()";
            return false;
        }

        else
        {
            return true; 
        }


    }
}

?>