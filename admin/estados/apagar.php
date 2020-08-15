<?php
include('../../lib/DAO/DAO_Estados.php');

$sigla = $_GET['sigla'];

$dao = new DAO_Estados();
$dao->apaga($sigla);

//header('Location: listar.php');
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
		Registro #<?php echo $sigla; ?> apagado com sucesso!
	</div>
</body>
</html>