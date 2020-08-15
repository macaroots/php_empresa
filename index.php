<?php
require('lib/DAO/DAO_Funcionarios.php');

$dao = new DAO_Funcionarios();
$funcionariosCeara = $dao->listaPorEstado('CE');
$funcionariosLa = $dao->listaPorNome('%la');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Empresa super legal</title>
	<meta charset="utf-8" />
</head>
<body>
	<header>
		<h1>Empresa super legal</h1>
		<nav>
			<ul>
				<li><a href="/php_empresa/index.php">Início</a></li>
				<li><a href="/php_empresa/admin/index.php">Admin</a></li>
			</ul>
		</nav>
	</header>
	
	<div>
		<h2>Funcionários do Ceará</h2>
		<div>
<?php
foreach ($funcionariosCeara as $funcionario) {
?>
			<div>
				<span><?php echo $funcionario['nome']; ?></span>
				<span><?php echo $funcionario['telefone']; ?></span>
			</div>
<?php
}
?>
		</div>
	</div>
	<div>
		<h2>Funcionários que terminam com "la"</h2>
		<div>
<?php
foreach ($funcionariosLa as $funcionario) {
?>
			<div>
				<span><?php echo $funcionario['nome']; ?></span>
				<span><?php echo $funcionario['telefone']; ?></span>
			</div>
<?php
}
?>
		</div>
	</div>
</body>
</html>