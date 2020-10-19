<?php 
include "connexion.php";
session_start();

$user_id = $_GET['user_id'];

$sql = $conn->prepare("SELECT * from users where id=?");
	$sql->execute([$user_id]);
	$res = $sql->fetch(PDO::FETCH_ASSOC);

$template = 'admin_user_update';
include 'layout.phtml';

