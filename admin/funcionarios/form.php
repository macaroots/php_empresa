<?php
include('../../lib/DAO/DAO_Funcionarios.php');
include('../../lib/DAO/DAO_Estados.php');

$daoEstados = new DAO_Estados();
$estados = $daoEstados->lista();

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$daoFuncionarios = new DAO_Funcionarios();
	$funcionario = $daoFuncionarios->getPorId($id);
}
else {
	$funcionario = array(
		'id' => 0,
		'nome' => '',
		'telefone' => '',
		'estado' => ''
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
			<input type="hidden" name="id" value="<?php echo $funcionario['id']; ?>" />
			<div>
				<label for="nome">Nome</label>
				<input id="nome" name="nome" type="text" value="<?php echo $funcionario['nome']; ?>" />
			</div>
			<div>
				<label for="telefone">Telefone</label>
				<input id="telefone" name="telefone" type="text" value="<?php echo $funcionario['telefone']; ?>" />
			</div>
			<div>
				<label for="estado">Estado</label>
				<select id="estado" name="estado">
<?php
foreach ($estados as $estado) {
?>
					<option value="<?php echo $estado['sigla']; ?>"<?php echo ($estado['sigla'] == $funcionario['estado'])?' selected':''; ?>><?php echo $estado['nome']; ?></option>
<?php
}
?>
				</select>
			</div>
			<input type="submit" />
		</form>
	</div>
</body>
</html>