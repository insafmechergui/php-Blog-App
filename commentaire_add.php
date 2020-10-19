<?php
include "connexion.php";
session_start();

if(!empty($_POST['message'])){
    $postid = $_POST['post_id'];
    $mess = $_POST['message'];
    $user=$_SESSION['user_id'];


    $sql = $conn->prepare("INSERT INTO commentaire (contenu, date_commentaire, post_id, user_id) VALUES (?,NOW(),?,?)");
    $sql->execute([$mess, $postid, $user]);

    
    header('Location: commentaire.php?id='.$postid);
exit();
}