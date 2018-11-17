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

ALTER TABLE estado ADD COLUMN image VARCHAR(255)

UPDATE estado SET image = '/images/estados/acre.png' WHERE id = 1;
UPDATE estado SET image = '/images/estados/alagoas.png' WHERE id = 2;
UPDATE estado SET image = '/images/estados/amapa.png' WHERE id = 3;
UPDATE estado SET image = '/images/estados/amazonas.png' WHERE id = 4;
UPDATE estado SET image = '/images/estados/bahia.png' WHERE id = 5;
UPDATE estado SET image = '/images/estados/ceara.png' WHERE id = 6;
UPDATE estado SET image = '/images/estados/distrito_federal.png' WHERE id = 7;
UPDATE estado SET image = '/images/estados/espirito_santo.png' WHERE id = 8;
UPDATE estado SET image = '/images/estados/goias.png' WHERE id = 9;
UPDATE estado SET image = '/images/estados/maranhao.png' WHERE id = 10;
UPDATE estado SET image = '/images/estados/mato_grosso.png' WHERE id = 11;
UPDATE estado SET image = '/images/estados/mato_grosso_do_sul.png' WHERE id = 12;
UPDATE estado SET image = '/images/estados/minas_gerais.png' WHERE id = 13;
UPDATE estado SET image = '/images/estados/para.png' WHERE id = 14;
UPDATE estado SET image = '/images/estados/paraiba.png' WHERE id = 15;
UPDATE estado SET image = '/images/estados/parana.png' WHERE id = 16;
UPDATE estado SET image = '/images/estados/pernambuco.png' WHERE id = 17;
UPDATE estado SET image = '/images/estados/piaui.png' WHERE id = 18;
UPDATE estado SET image = '/images/estados/rio_de_janeiro.png' WHERE id = 19;
UPDATE estado SET image = '/images/estados/rio_grande_do_norte.png' WHERE id = 20;
UPDATE estado SET image = '/images/estados/rio_grande_do_sul.png' WHERE id = 21;
UPDATE estado SET image = '/images/estados/rondonia.png' WHERE id = 22;
UPDATE estado SET image = '/images/estados/roraima.png' WHERE id = 23;
UPDATE estado SET image = '/images/estados/sergipe.png' WHERE id = 24;
UPDATE estado SET image = '/images/estados/santa_catarina.png' WHERE id = 25;
UPDATE estado SET image = '/images/estados/sao_paulo.png' WHERE id = 26;
UPDATE estado SET image = '/images/estados/tocantins.png' WHERE id = 27;
UPDATE estado SET image = '/images/estados/estado_nao_definido.png' WHERE id = 28;