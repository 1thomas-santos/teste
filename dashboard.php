<?php session_start(); ?>

<pre>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>haha</title>
	<style>
		*{
			margin: 0;
			padding: 10px;
		}
		.parafuso-intro{
			display: flex;
			align-items: center;
			justify-content: space-between;
			flex-wrap: wrap;

		}
	</style>
</head>
<body>

	<div class="parafuso-intro">
		<h1>Tabela de parafuso</h1>
		<a href="logout.php">Logout</a>
	</div>
		<?php 
		require 'banco.php';
		$stmt=$pdo->prepare("SELECT * FROM PARAFUSO WHERE USUARIO_ID=?");
		$stmt->execute([$_SESSION['usuario_id']]);
		$parafuso_info=$stmt->fetchAll();
		

		?>
			</pre>
			 <table>
			 	<tr>
			 		<th>Parafusos</th>
			 		<th>Tipo</th>
			 		<th>Quantidade</th>
			 		<th>largura</th>
			 		<th>Comprimento</th>
			 	</tr>
			 	<?php foreach ($parafuso_info as $parafuso):?>
			 	<tr>
				 	<td><?= $parafuso['TIPO'] ?></td> 
				 	<td><?= $parafuso['QUANTIDADE'] ?></td> 
				 	<td><?= $parafuso['LARGURA'] ?></td> 
				 	<td><?= $parafuso['COMPRIMENTO'] ?></td> 
				 	
				 	<td><a href="deletparafuso.php?id=<?=$parafuso['ID_PARAFUSO']?>">Deletar</a></td>
			 	</tr>
			 	<?php endforeach ?>
			 </table>

 <form action="add_parafuso.php" method="POST">
 	<fieldset>
 		<legend>tabela de parafuso</legend>
 		<input type="text" name="quantidade" placeholder="quantidade">
 		<input type="text" name="largura" placeholder="largura">
 		<input type="text" name="comprimento" placeholder="comprimento">
 		<select name="tipo">
 			<option value="" disabled selected >tipo</option>
 			<option value="phillips">phillips</option>
 			<option value="sextavado">sextavado</option>
 			<option value="allen">allen</option>
 		</select> 
 		<button>Enviar</button>
 	</fieldset>
 </form>
</body>
</html>				