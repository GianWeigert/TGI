/* 
    ESTE SCRIPT CRIA A TABELA DESPESAS_PARLAMENTARES
*/

USE gastos_parlamentares_db;

-- TABELA DESPESAS_PARLAMENTARES

DROP TABLE IF EXISTS despesas_parlamentares;

CREATE TABLE despesas_parlamentares(
	id INT,
	especificacao_despesa VARCHAR(255),
	numero_nota VARCHAR(255) NOT NULL,
	data_emissao DATETIME NOT NULL,
	valor_documento DECIMAL(9,2) NOT NULL,
	valor_glosa DECIMAL(9,2) NOT NULL,
	valor_liquido DECIMAL(9,2) NOT NULL,
	valor_restituicao DECIMAL(9,2) NOT NULL,
	parlamentar_id INT NOT NULL,
	despesa_id INT NOT NULL,
	fornecedor_id INT NOT NULL,
	documento_id INT NOT NULL
);

ALTER TABLE despesas_parlamentares MODIFY id INT AUTO_INCREMENT PRIMARY KEY;
ALTER TABLE despesas_parlamentares ADD CONSTRAINT id_fk_parlamentar FOREIGN KEY(parlamentar_id) REFERENCES parlamentar(id);
ALTER TABLE despesas_parlamentares ADD CONSTRAINT id_fk_despesa FOREIGN KEY(despesa_id) REFERENCES despesa(id);
ALTER TABLE despesas_parlamentares ADD CONSTRAINT id_fk_fornecedor FOREIGN KEY(fornecedor_id) REFERENCES fornecedor(id);
ALTER TABLE despesas_parlamentares ADD CONSTRAINT id_fk_documento FOREIGN KEY(documento_id) REFERENCES tipo_documento(id);
