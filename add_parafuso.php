<pre>

<?php  
 session_start();
$user= $_SESSION['user_login'];

if(!isset($user)) { 
	header('location:login.php');
	exit();
}



$tipo=$_POST["tipo"];
$quantidade=$_POST["quantidade"];
$largura=$_POST["largura"];
$comprimento=$_POST["comprimento"];


require 'banco.php';

$stmt= $pdo-> prepare("INSERT INTO PARAFUSO (TIPO,QUANTIDADE,LARGURA,COMPRIMENTO,USUARIO_ID) VALUES (?,?,?,?,?)");
$stmt-> execute([$tipo,$quantidade,$largura,$comprimento,$_SESSION['usuario_id']]);
header('location:dashboard.php');
?>
</pre>