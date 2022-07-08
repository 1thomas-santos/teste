<pre>

<?php

session_start();

require 'banco.php';
$user=$_POST['login'];
$password=sha1($_POST['password']);

$stmt= $pdo-> prepare("
	SELECT * FROM USUARIO WHERE LOGIN_USER= ? AND SENHA_USER= ? 
	");
$stmt->execute([$user,$password]);
$results= $stmt->fetchAll();

if(sizeof($results)>0){
	$user=$results[0];
	$_SESSION['user_login']=$user['LOGIN_USER'];
	$_SESSION['usuario_id']=$user['ID'];
	header('location:dashboard.php');
	exit();
}
exit();


?>
</pre>