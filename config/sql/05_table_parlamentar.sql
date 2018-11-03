/* 
    ESTE SCRIPT CRIA A TABELA PARLAMENTAR
*/

USE gastos_parlamentares_db;

-- TABELA PARLAMENTAR

DROP TABLE IF EXISTS parlamentar;

CREATE TABLE parlamentar (
    id INT,
    nome VARCHAR(255) NOT NULL,
    numero_cadastro INT,
    partido_id INT NOT NULL,
    estado_id INT NOT NULL
);

ALTER TABLE parlamentar MODIFY id INT AUTO_INCREMENT PRIMARY KEY;
ALTER TABLE parlamentar ADD CONSTRAINT id_fk_partido FOREIGN KEY(partido_id) REFERENCES partido(id);
ALTER TABLE parlamentar ADD CONSTRAINT id_fk_estado FOREIGN KEY(estado_id) REFERENCES estado(id);
