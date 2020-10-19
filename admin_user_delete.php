<?php 
include "connexion.php";

$user_id = $_GET['user_id'];
    $query =$conn->prepare ('DELETE FROM users WHERE Id = ? ');
    
    $query->execute([$user_id]);

header("Location: admin.php");