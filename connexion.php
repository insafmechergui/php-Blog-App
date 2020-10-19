<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "newblog";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    
   
?> 