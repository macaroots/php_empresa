<?php
class DAO_Abstrato {
	function conecta() {
		$conexao = new PDO('mysql:host=localhost;dbname=empresa', 'root', 'admin');
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conexao;
	}
}