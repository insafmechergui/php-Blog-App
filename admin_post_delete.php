<?php 
include "connexion.php";

$post_id = $_GET['post_id'];
   // Suppression d'un article du blog.
    $query =$conn->prepare ('DELETE FROM posts WHERE Id = ? ');
    
    $query->execute([$post_id]);

header("Location: admin.php");