/* 
    ESTE SCRIPT CRIA A TABELA TIPO_DOCUMENTO E INSERE OS TIPOS DE DOCUMENTOS 
    QUE UMA DESPESA PODE TER
*/

USE gastos_parlamentares_db;

-- TABELA TIPO DOCUMENTO

DROP TABLE IF EXISTS tipo_documento;

CREATE TABLE tipo_documento (
	id INT,
	descricao VARCHAR(255) NOT NULL,
	numero_documento INT NOT NULL
);

ALTER TABLE tipo_documento MODIFY id INT AUTO_INCREMENT PRIMARY KEY;

-- DADOS REFERENTES A TIPO DE DOCUEMNTOS DAS DESPESAS

INSERT INTO tipo_documento(descricao, numero_documento) VALUES("Nota fiscal", 0);
INSERT INTO tipo_documento(descricao, numero_documento) VALUES("Recibo", 1);
INSERT INTO tipo_documento(descricao, numero_documento) VALUES("Despesa no exterior", 2);
