<?php
 session_start();

if(!isset($_SESSION['user_login'])) { 
	header('location:login.php');
	exit();
}


$id=$_GET['id'];
$user_id=$_SESSION['usuario_id'];

 require 'banco.php';

$stmt=$pdo->prepare('DELETE FROM PARAFUSO WHERE ID_PARAFUSO=? AND USUARIO_ID=?');
$stmt->execute([$id,$user_id]);


header("location: dashboard.php");
  ?>