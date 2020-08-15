<?php
include('../../lib/DAO/DAO_Funcionarios.php');

try {
	$id = $_POST['id'];
	$funcionario = array(
		'nome' => $_POST['nome'],
		'telefone' => $_POST['telefone'],
		'estado' => $_POST['estado']
	);

	$dao = new DAO_Funcionarios();
	
	if ($id == 0) {
		$id = $dao->insere($funcionario);
		$acao = 'inserido';
	}
	else {
		$dao->edita($funcionario, $id);
		$acao = 'editado';
	}
	
	//header('Location: listar.php');
	
} catch (PDOException $e) {
	print 'Error!: ' . $e->getMessage(); 
	die();
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
		Registro #<?php echo $id; ?> <?php echo $acao; ?> com sucesso!
	</div>
</body>
</html>