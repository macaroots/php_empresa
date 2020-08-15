<?php
class DAO_Abstrato {
	function conecta() {
		$conexao = new PDO('mysql:host=localhost;dbname=empresa', 'root', 'admin');
		return $conexao;
	}
}