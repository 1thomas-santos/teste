<!DOCTYPE html>
<html>
	<head>
		
	</head>
		<body>
			<form action="cadastro_auth.php" method="POST">
				<?php if (isset($_GET['error'])): ?> 
				<div> <?=$_GET['error'] ?></div>
				<?php endif ?> 
				<label>Nome:</label><br>
				<input type="text" name="user" placeholder="Nome"><br>
				<label>Senha:</label><br>
				<input type="password" name="password" placeholder="Senha"><br>
				<label>Confirmar da Senha:</label><br>
				<input type="password" name="confirm-senha" placeholder="Confirmar da Senha"><br>
				<input type="submit" value="cadastrar"> <a href="login.php">Fazer Login</a>
			</form>
		</body>
</html>