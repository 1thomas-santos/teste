<?php
	$user=$_POST['user'];
	$password=$_POST['password'];
	$confirm=$_POST['confirm-senha'];


if ($password!=$confirm){
	header('location:cadastro.php?error=senhas são diferentes');
	exit();
}else if($user===''){
	header('location:cadastro.php?error=usuario vazio');
	exit();
}else if($password===''){
	header('location:cadastro.php?error=campo de senha vazio');
	exit();
}

require 'banco.php';

$stmt=$pdo->prepare("
	SELECT * FROM USUARIO WHERE LOGIN_USER=?
	");
$stmt->execute([$user]);
if($stmt->rowCount() > 0){
	header('location:cadastro.php?error=login já em uso'.$login);
	exit();
}

$stmt=$pdo->prepare("
	INSERT INTO USUARIO (LOGIN_USER,SENHA_USER) VALUES(?, ?)
	");
$stmt->execute ([$user,sha1($password)]);

header('location:login.php');
?>