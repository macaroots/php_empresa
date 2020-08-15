<?php
include('../../lib/DAO/DAO_Estados.php');
$dao = new DAO_Estados();
$estados = $dao->lista();
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
		<table>
			<thead>
				<tr>
					<th>Sigla</th>
					<th>Nome</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
<?php
if (!empty($estados)) {
	foreach ($estados as $linha) {
?>			
				<tr>
					<td><?php echo $linha['sigla']; ?></td>
					<td><?php echo $linha['nome']; ?></td>
					<td>
						<a href="form.php?sigla=<?php echo $linha['sigla']; ?>">editar</a>
						<a onClick="return confirm('Certeza que quer apagar \'<?php echo $linha['sigla']; ?>\'?');" href="apagar.php?sigla=<?php echo $linha['sigla']; ?>">apagar</a>
					</td>
				</tr>
<?php
	}
}
else {
?>
				<tr>
					<td colspan="2">Registros não encontrados</td>
				</tr>
<?php
}
?>
			</tbody>
		</table>
	</div>
</body>
</html>