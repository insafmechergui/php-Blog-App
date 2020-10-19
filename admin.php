<?php
session_start();
include "connexion.php";


$sql = $conn->prepare("SELECT *, usr.id from users usr LEFT JOIN role r on usr.role_id = r.id GROUP BY  email ");
	$sql->execute();
	$res = $sql->fetchAll(PDO::FETCH_CLASS);

$stmt = $conn->prepare("SELECT * from posts ");
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_CLASS);	

$post = $conn->prepare("SELECT * from category ");
	$post->execute();
	$cat = $post->fetchAll(PDO::FETCH_CLASS);
	
//print_r($result);
$template = 'admin';
include 'layout.phtml';




?>