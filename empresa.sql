CREATE TABLE funcionarios (
	id INT PRIMARY KEY,
	nome VARCHAR(45),
	telefone VARCHAR(45),
	estado CHAR(2)
);

CREATE TABLE habilidades (
	id INT PRIMARY KEY,
	nome VARCHAR(45)
);

CREATE TABLE funcionarios_tem_habilidades (
	id_funcionario INT,
	id_habilidade INT,
    PRIMARY KEY(id_funcionario, id_habilidade),
    INDEX `fk_funcionarios_has_habilidades_habilidades1_idx` (`id_habilidade` ASC),
	INDEX `fk_funcionarios_has_habilidades_funcionarios1_idx` (`id_funcionario` ASC),
	CONSTRAINT `fk_funcionarios_has_habilidades_funcionarios1`
		FOREIGN KEY (`id_funcionario`)
		REFERENCES `funcionarios` (`id`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT `fk_funcionarios_has_habilidades_habilidades1`
		FOREIGN KEY (`id_habilidade`)
		REFERENCES `habilidades` (`id`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
);
	
CREATE TABLE estados (
	sigla CHAR(2) PRIMARY KEY,
	nome VARCHAR(45)
);
    
CREATE TABLE departamentos (
	id INT PRIMARY KEY,
	nome VARCHAR(45),
	id_chefe INT
);
	
CREATE TABLE cargos (
	id INT PRIMARY KEY,
	nome VARCHAR(45),
	id_departamento INT,
	salario FLOAT
);
	
CREATE TABLE funcionarios_tem_cargos (
	id_funcionario INT,
	id_cargo INT,
	data_admissao DATE,
	data_demissao DATE,
    PRIMARY KEY(id_funcionario, id_cargo)
);
	
CREATE TABLE noticias (
	id INT PRIMARY KEY,
	titulo VARCHAR(255),
	data DATETIME,
	texto TEXT
);

INSERT INTO funcionarios VALUES (DEFAULT, 'Ana', '423', 'BA');

SELECT * FROM funcionarios;

INSERT INTO habilidades VALUES (DEFAULT, 'Adminstração');

SELECT * FROM habilidades;

INSERT INTO funcionarios_tem_habilidades VALUES (4, 3);

SELECT * FROM funcionarios_tem_habilidades;

INSERT INTO estados VALUES ('CE', 'Ceará'), ('BA', 'Bahia');

SELECT * FROM estados;

INSERT INTO departamentos (nome) VALUES ('Financeiro');

SELECT * FROM departamentos;

INSERT INTO cargos VALUES (DEFAULT, 'Gerente');

SELECT * FROM cargos;

INSERT INTO funcionarios_tem_cargos VALUES (2, 1, '2020-01-01', NULL);

SELECT * FROM funcionarios_tem_cargos;

INSERT INTO noticias VALUES (DEFAULT, 'Pandemia vai acabar!', '2020-10-01', 'Finalmente acabou!');

SELECT * FROM noticias;

SELECT * FROM noticias WHERE data > current_date() - 7;

SELECT * FROM funcionarios WHERE estado='CE';

SELECT * FROM funcionarios WHERE nome like '%la';

SELECT count(*) FROM funcionarios;

SELECT estado, count(*) FROM funcionarios GROUP BY estado;
SELECT e.nome, count(*) FROM funcionarios f JOIN estados e ON estado=sigla GROUP BY estado;

SELECT d.nome, f.nome FROM departamentos d JOIN funcionarios f ON id_chefe=f.id;
SELECT d.nome, f.nome FROM departamentos d LEFT JOIN funcionarios f ON id_chefe=f.id;
SELECT d.nome, f.nome FROM departamentos d RIGHT JOIN funcionarios f ON id_chefe=f.id;

SELECT * FROM departamentos d JOIN funcionarios f ON id_chefe=f.id WHERE d.nome='TI';
SELECT telefone FROM departamentos d JOIN funcionarios f ON id_chefe=f.id WHERE d.nome='TI';

SELECT * FROM funcionarios_tem_cargos f JOIN cargos c ON id_cargo=id;
SELECT sum(salario) FROM funcionarios_tem_cargos f JOIN cargos c ON id_cargo=id;
