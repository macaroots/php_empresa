<?php
require_once('DAO_Abstrato.php');
class DAO_Estados extends DAO_Abstrato  {
	
	function lista() {
		try {
			$conexao = $this->conecta();
			
			$sql = 'SELECT * FROM estados';
			$consulta = $conexao->prepare($sql);
			$consulta->execute();
			$lista = $consulta->fetchAll();
			
			$conexao = null;
			
			return $lista;
		} catch (PDOException $e) {
			throw $e; 
			return null;
		}

	}
	
	function insere($estado) {
		try {
			$conexao = $this->conecta();
			
			$sql = "INSERT INTO estados VALUES (:sigla, :nome)";
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(':sigla', $estado['sigla']);
			$consulta->bindParam(':nome', $estado['nome']);
			$consulta->execute();
			
			$id = $conexao->lastInsertId();
			
			$conexao = null;
			
			return $id;			
		} catch (PDOException $e) {
			throw $e; 
			return null;
		}

	}
	
	function edita($estado, $sigla) {
		try {
			$conexao = $this->conecta();
			
			$sql = "UPDATE estados SET sigla=:sigla, nome=:nome WHERE sigla=:sigla_antiga";
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(':sigla', $estado['sigla']);
			$consulta->bindParam(':nome', $estado['nome']);
			$consulta->bindParam(':sigla_antiga', $sigla);
			$consulta->execute();
			
			$conexao = null;
				
		} catch (PDOException $e) {
			throw $e; 
			return null;
		}

	}
	
	function getPorSigla($sigla) {
		try {
			$conexao = $this->conecta();
			
			$sql = 'SELECT * FROM estados WHERE sigla=?';
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(1, $sigla);
			$consulta->execute();
			$linha = $consulta->fetch();
			
			$conexao = null;
			
			return $linha;
		} catch (PDOException $e) {
			throw $e; 
			return null;
		}
	}
	
	function apaga($sigla) {
		try {
			$conexao = $this->conecta();
			
			$sql = 'DELETE FROM estados WHERE sigla=?';
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(1, $sigla);
			$consulta->execute();
			
			$conexao = null;
			
		} catch (PDOException $e) {
			throw $e; 
			return null;
		}
	}
}
