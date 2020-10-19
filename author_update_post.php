<?php
session_start();
include "connexion.php";


if(!empty($_POST['titre']))
{
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $image = $_POST['image'];
    $category = $_POST['category'];
    $user=$_SESSION['user_id'];

     $update = $conn->prepare('UPDATE posts SET titre = ?,contenu = ?,date_post = NOW(),user_id = ?,category_id = ? WHERE id ='.$id);
     $update->execute([$titre, $contenu, $user, $category]);
    
     $updateimg = $conn->prepare('UPDATE image SET url=? WHERE post_id ='.$id);
     $updateimg->execute([$image]);

}
header("Location: author.php");
