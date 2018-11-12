/* 
    ESTE SCRIPT CRIA A TABELA ESTADO E INSERE TODOS ESTADOS E SEUS RESPECTIVO UF
*/


USE gastos_parlamentares_db;

-- TABELA ESTADO

DROP TABLE IF EXISTS estado;

CREATE TABLE estado (
	id INT,
	nome VARCHAR(255) NOT NULL,
	uf VARCHAR(02) NOT NULL
);

ALTER TABLE estado MODIFY id INT AUTO_INCREMENT PRIMARY KEY;

-- INSERE DADOS NA TABELA ESTADO

INSERT INTO estado(nome, uf) VALUES("Acre", "AC");
INSERT INTO estado(nome, uf) VALUES("Alagoas", "AL");
INSERT INTO estado(nome, uf) VALUES("Amapá", "AP");
INSERT INTO estado(nome, uf) VALUES("Amazonas", "AM");
INSERT INTO estado(nome, uf) VALUES("Bahia", "BA");
INSERT INTO estado(nome, uf) VALUES("Ceará", "CE");
INSERT INTO estado(nome, uf) VALUES("Distrito Federal", "DF");
INSERT INTO estado(nome, uf) VALUES("Espírito Santo", "ES");
INSERT INTO estado(nome, uf) VALUES("Goiás", "GO");
INSERT INTO estado(nome, uf) VALUES("Maranhão", "MA");
INSERT INTO estado(nome, uf) VALUES("Mato Grosso", "MT");
INSERT INTO estado(nome, uf) VALUES("Mato Grosso do Sul", "MS");
INSERT INTO estado(nome, uf) VALUES("Minas Gerais", "MG");
INSERT INTO estado(nome, uf) VALUES("Pará", "PA");
INSERT INTO estado(nome, uf) VALUES("Paraíba", "PB");
INSERT INTO estado(nome, uf) VALUES("Paraná", "PR");
INSERT INTO estado(nome, uf) VALUES("Pernambuco", "PE");
INSERT INTO estado(nome, uf) VALUES("Piauí", "PI");
INSERT INTO estado(nome, uf) VALUES("Rio de Janeiro", "RJ");
INSERT INTO estado(nome, uf) VALUES("Rio Grande do Norte", "RN");
INSERT INTO estado(nome, uf) VALUES("Rio Grande do Sul", "RS");
INSERT INTO estado(nome, uf) VALUES("Rondônia", "RO");
INSERT INTO estado(nome, uf) VALUES("Roraima", "RR");
INSERT INTO estado(nome, uf) VALUES("Sergipe", "SE");
INSERT INTO estado(nome, uf) VALUES("Santa Catarina", "SC");
INSERT INTO estado(nome, uf) VALUES("São Paulo", "SP");
INSERT INTO estado(nome, uf) VALUES("Tocantins  ", "TO");
INSERT INTO estado(nome, uf) VALUES("Estado não definido", "ND");