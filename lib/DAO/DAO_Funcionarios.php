<?php
require_once('DAO_Abstrato.php');
class DAO_Funcionarios extends DAO_Abstrato {
	
	function lista() {
		try {
			$conexao = $this->conecta();
			
			$sql = 'SELECT * FROM funcionarios';
			$consulta = $conexao->prepare($sql);
			$consulta->execute();
			$lista = $consulta->fetchAll();
			
			$conexao = null;
			
			return $lista;
		} catch (PDOException $e) {
			//print 'Error!: ' . $e->getMessage(); 
			return null;
		}
	}
	
	function listaPorEstado($estado) {
		try {
			$conexao = $this->conecta();
			
			$sql = 'SELECT * FROM funcionarios WHERE estado = ?';
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(1, $estado);
			$consulta->execute();
			$lista = $consulta->fetchAll();
			
			$conexao = null;
			
			return $lista;
		} catch (PDOException $e) {
			//print 'Error!: ' . $e->getMessage(); 
			return null;
		}
	}
	
	function listaPorNome($nome) {
		try {
			$conexao = $this->conecta();
			
			$sql = 'SELECT * FROM funcionarios WHERE nome like ?';
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(1, $nome);
			$consulta->execute();
			$lista = $consulta->fetchAll();
			
			$conexao = null;
			
			return $lista;
		} catch (PDOException $e) {
			//print 'Error!: ' . $e->getMessage(); 
			return null;
		}
	}
	
	function insere($funcionario) {
		try {
			$conexao = $this->conecta();
			
			$sql = "INSERT INTO funcionarios VALUES (DEFAULT, :nome, :telefone, :estado)";
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(':nome', $funcionario['nome']);
			$consulta->bindParam(':telefone', $funcionario['telefone']);
			$consulta->bindParam(':estado', $funcionario['estado']);
			$consulta->execute();
			
			$id = $conexao->lastInsertId();
			
			$conexao = null;
			
			return $id;			
		} catch (PDOException $e) {
			//print 'Error!: ' . $e->getMessage(); 
			return null;
		}

	}
	
	function edita($funcionario, $id) {
		try {
			$conexao = $this->conecta();
			
			$sql = "UPDATE funcionarios SET nome=:nome, telefone=:telefone, estado=:estado WHERE id=:id";
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(':nome', $funcionario['nome']);
			$consulta->bindParam(':telefone', $funcionario['telefone']);
			$consulta->bindParam(':estado', $funcionario['estado']);
			$consulta->bindParam(':id', $id);
			$consulta->execute();
			
			$conexao = null;
				
		} catch (PDOException $e) {
			//print 'Error!: ' . $e->getMessage(); 
			return null;
		}

	}
	
	function getPorId($id) {
		try {
			$conexao = $this->conecta();
			
			$sql = 'SELECT * FROM funcionarios WHERE id=?';
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(1, $id);
			$consulta->execute();
			$linha = $consulta->fetch();
			
			$conexao = null;
			
			return $linha;
		} catch (PDOException $e) {
			//print 'Error!: ' . $e->getMessage(); 
			return null;
		}
	}
	
	function apaga($id) {
		try {
			$conexao = $this->conecta();
			
			$sql = 'DELETE FROM funcionarios WHERE id=?';
			$consulta = $conexao->prepare($sql);
			$consulta->bindParam(1, $id);
			$consulta->execute();
			
			$conexao = null;
			
		} catch (PDOException $e) {
			//print 'Error!: ' . $e->getMessage(); 
			return null;
		}
	}
}