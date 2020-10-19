<?php 
include "connexion.php";
session_start();

if(!empty($_POST['nom']))
{
    $user_id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];

    $query =$conn->prepare ('UPDATE users SET nom=?,prenom=?,email=? WHERE id='.$user_id);
    $query->execute([$nom, $prenom, $mail]);
    
}

header("Location: admin.php");

