<?php
include('../../lib/DAO/DAO_Estados.php');

$sigla = $_POST['sigla_antiga'];
$estado = array(
	'sigla' => $_POST['sigla'],
	'nome' => $_POST['nome']
);

$dao = new DAO_Estados();

if ($sigla == '') {
	$id = $dao->insere($estado);
	$acao = 'inserido';
}
else {
	$dao->edita($estado, $sigla);
	$acao = 'editado';
}

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
		Registro #<?php echo $sigla; ?> <?php echo $acao; ?> com sucesso!
	</div>
</body>
</html>