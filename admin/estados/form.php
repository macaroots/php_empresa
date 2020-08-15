<?php
require('../../lib/DAO/DAO_Estados.php');

if (isset($_GET['sigla'])) {
	$sigla = $_GET['sigla'];
	$dao = new DAO_Estados();
	$estado = $dao->getPorSigla($sigla);
}
else {
	$estado = array(
		'sigla' => '',
		'nome' => ''
	);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de adminstração</title>
	<meta charset="utf-8" />
</head>
<body>
<?php include('../cabecalho.php'); ?>
	<div>
		<form method="POST" action="cadastrar.php">
			<input type="hidden" name="sigla_antiga" value="<?php echo $estado['sigla']; ?>" />
			<div>
				<label for="sigla">Sigla</label>
				<input id="sigla" name="sigla" type="text" maxlength="2" value="<?php echo $estado['sigla']; ?>" />
			</div>
			<div>
				<label for="nome">Nome</label>
				<input id="nome" name="nome" type="text" value="<?php echo $estado['nome']; ?>" />
			</div>
			<input type="submit" />
		</form>
	</div>
</body>
</html>