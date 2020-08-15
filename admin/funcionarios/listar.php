<?php
include('../../lib/DAO/DAO_Funcionarios.php');
$dao = new DAO_Funcionarios();

if (isset($_GET['estado'])) {
	$funcionarios = $dao->listaPorEstado($_GET['estado']);
}
else {
	$funcionarios = $dao->lista();
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
		<form>
			Filtrar por estado:
			<input type="text" name="estado" />
			<input type="submit" />
		</form>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Telefone</th>
					<th>Estado</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
<?php
if (!empty($funcionarios)) {
	foreach ($funcionarios as $linha) {
?>			
				<tr>
					<td><?php echo $linha['id']; ?></td>
					<td><?php echo $linha['nome']; ?></td>
					<td><?php echo $linha['telefone']; ?></td>
					<td><?php echo $linha['estado']; ?></td>
					<td>
						<a href="form.php?id=<?php echo $linha['id']; ?>">editar</a>
						<a onClick="return confirm('Certeza que quer apagar #<?php echo $linha['id']; ?>?');" href="apagar.php?id=<?php echo $linha['id']; ?>">apagar</a>
					</td>
				</tr>
<?php
	}
}
else {
?>
				<tr>
					<td colspan="4">Registros não encontrados</td>
				</tr>
<?php
}
?>
			</tbody>
		</table>
	</div>
</body>
</html>