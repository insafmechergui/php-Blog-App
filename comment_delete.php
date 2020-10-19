<?php

include "connexion.php";
session_start();

if(!empty($_POST['comm_id']))
{
    $comm_id = $_POST['comm_id'];
    $query =$conn->prepare ('DELETE FROM commentaire WHERE id = ? ');
    
    $query->execute([$comm_id]);
   $postid = $_POST['post_id'];
    header('Location: comment.php?id='.$postid);
exit();
}
