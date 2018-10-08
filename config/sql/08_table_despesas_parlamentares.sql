/* 
    ESTE SCRIPT CRIA A TABELA DESPESAS_PARLAMENTARES
*/

USE gastos_parlamentares_db;

-- TABELA DESPESAS_PARLAMENTARES

DROP TABLE IF EXISTS despesas_parlamentares;

CREATE TABLE despesas_parlamentares(
	id INT,
	especificacao_despesa VARCHAR(255) NOT NULL,
	numero_nota INT NOT NULL,
	data_emissao DATETIME NOT NULL,
	valor_documento DECIMAL(9,2) NOT NULL,
	valor_glosa DECIMAL(9,2) NOT NULL,
	valor_liquido DECIMAL(9,2) NOT NULL,
	parlamentar_id INT NOT NULL,
	despesa_id INT NOT NULL,
	fornecedor_id INT NOT NULL
);

ALTER TABLE despesas_parlamentares MODIFY id INT AUTO_INCREMENT PRIMARY KEY;
ALTER TABLE despesas_parlamentares ADD CONSTRAINT id_fk_parlamentar FOREIGN KEY(parlamentar_id) REFERENCES parlamentar(id);
ALTER TABLE despesas_parlamentares ADD CONSTRAINT id_fk_despesa FOREIGN KEY(despesa_id) REFERENCES despesa(id);
ALTER TABLE despesas_parlamentares ADD CONSTRAINT id_fk_fornecedor FOREIGN KEY(fornecedor_id) REFERENCES fornecedor(id);
