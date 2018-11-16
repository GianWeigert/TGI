/* 
    ESTE SCRIPT CRIA A TABELA PARTIDO E INSERE OS DADOS DE TODOS OS PARTIDO 
    REGISTRADOS NO TSE    
*/

USE gastos_parlamentares_db;

-- TABELA PARTIDO

DROP TABLE IF EXISTS partido;

CREATE TABLE partido (
	id INT,
	nome VARCHAR(255) NOT NULL,
	sigla VARCHAR(255) NOT NULL
);

ALTER TABLE partido MODIFY id INT AUTO_INCREMENT PRIMARY KEY;

-- DADOS INSERIDOS

INSERT INTO partido(nome, sigla) VALUES("MOVIMENTO DEMOCRÁTICO BRASILEIRO", "PMDB");
INSERT INTO partido(nome, sigla) VALUES("MOVIMENTO DEMOCRÁTICO BRASILEIRO", "MDB");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO TRABALHISTA BRASILEIRO", "PTB");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO DEMOCRÁTICO TRABALHISTA", "PDT");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO DOS TRABALHADORES", "PT");
INSERT INTO partido(nome, sigla) VALUES("DEMOCRATAS", "DEM");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO COMUNISTA DO BRASIL", "PCdoB");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO SOCIALISTA BRASILEIRO", "PSB");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO DA SOCIAL DEMOCRACIA BRASILEIRA", "PSDB");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO TRABALHISTA CRISTÃO", "PTC");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO SOCIAL CRISTÃO", "PSC");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO DA MOBILIZAÇÃO NACIONAL", "PMN");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO REPUBLICANO PROGRESSISTA", "PRP");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO POPULAR SOCIALISTA", "PPS");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO VERDE	", "PV");
INSERT INTO partido(nome, sigla) VALUES("AVANTE", "AVANTE");
INSERT INTO partido(nome, sigla) VALUES("PROGRESSISTAS", "PP");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO SOCIALISTA DOS TRABALHADORES UNIFICADO", "PSTU");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO COMUNISTA BRASILEIRO", "PCB");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO RENOVADOR TRABALHISTA BRASILEIRO", "PRTB");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO HUMANISTA DA SOLIDARIEDADE", "PHS");
INSERT INTO partido(nome, sigla) VALUES("DEMOCRACIA CRISTÃ", "DC");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO DA CAUSA OPERÁRIA", "PCO");
INSERT INTO partido(nome, sigla) VALUES("PODEMOS", "PODE");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO SOCIAL LIBERAL", "PSL");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO REPUBLICANO BRASILEIRO", "PRB");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO SOCIALISMO E LIBERDADE", "PSOL");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO DA REPÚBLICA", "PR");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO SOCIAL DEMOCRÁTICO", "PSD");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO PÁTRIA LIVRE", "PPL");
INSERT INTO partido(nome, sigla) VALUES("PATRIOTA", "PATRI");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO REPUBLICANO DA ORDEM SOCIAL", "PROS");
INSERT INTO partido(nome, sigla) VALUES("SOLIDARIEDADE", "SOLIDARIEDADE");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO NOVO", "NOVO");
INSERT INTO partido(nome, sigla) VALUES("REDE SUSTENTABILIDADE", "REDE");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO DA MULHER BRASILEIRA", "PMB");
INSERT INTO partido(nome, sigla) VALUES("PARTIDO NÃO INDENTIFICADO NO PORTAL DA TRANSPARIÊNCIA", "PNIPT");

ALTER TABLE partido ADD COLUMN image varchar(255);

UPDATE partido SET image = '/images/partidos/mdb.png' WHERE id = 1;
UPDATE partido SET image = '/images/partidos/mdb.png' WHERE id = 2;
UPDATE partido SET image = '/images/partidos/ptb.png' WHERE id = 3;
UPDATE partido SET image = '/images/partidos/pdt.png' WHERE id = 4; 
UPDATE partido SET image = '/images/partidos/pt.png' WHERE id = 5;
UPDATE partido SET image = '/images/partidos/dem.png' WHERE id = 6;
UPDATE partido SET image = '/images/partidos/pcdob.png' WHERE id = 7; 
UPDATE partido SET image = '/images/partidos/psb.png' WHERE id = 8;
UPDATE partido SET image = '/images/partidos/psdb.png' WHERE id = 9; 
UPDATE partido SET image = '/images/partidos/ptc.png' WHERE id = 10;
UPDATE partido SET image = '/images/partidos/psc.png' WHERE id = 11;
UPDATE partido SET image = '/images/partidos/pmn.png' WHERE id = 12;
UPDATE partido SET image = '/images/partidos/prp.png' WHERE id = 13;
UPDATE partido SET image = '/images/partidos/pps.png' WHERE id = 14;
UPDATE partido SET image = '/images/partidos/pv.png' WHERE id = 15;
UPDATE partido SET image = '/images/partidos/avante.png' WHERE id = 16;
UPDATE partido SET image = '/images/partidos/pp.png' WHERE id = 17;
UPDATE partido SET image = '/images/partidos/pstu.png' WHERE id = 18;
UPDATE partido SET image = '/images/partidos/pcb.png' WHERE id = 19;
UPDATE partido SET image = '/images/partidos/prtb.png' WHERE id = 20;
UPDATE partido SET image = '/images/partidos/phs.png' WHERE id = 21; 
UPDATE partido SET image = '/images/partidos/dc.png' WHERE id = 22;
UPDATE partido SET image = '/images/partidos/pco.png' WHERE id = 23;
UPDATE partido SET image = '/images/partidos/pode.png' WHERE id = 24;
UPDATE partido SET image = '/images/partidos/psl.png' WHERE id = 25;
UPDATE partido SET image = '/images/partidos/prb.png' WHERE id = 26;
UPDATE partido SET image = '/images/partidos/psol.png' WHERE id = 27;
UPDATE partido SET image = '/images/partidos/pr.png' WHERE id = 28;
UPDATE partido SET image = '/images/partidos/psd.png' WHERE id = 29;
UPDATE partido SET image = '/images/partidos/ppl.png' WHERE id = 30;
UPDATE partido SET image = '/images/partidos/patriota.png' WHERE id = 31;
UPDATE partido SET image = '/images/partidos/pros.png' WHERE id = 32;
UPDATE partido SET image = '/images/partidos/solidariedade.png' WHERE id = 33;
UPDATE partido SET image = '/images/partidos/novo.png' WHERE id = 34;
UPDATE partido SET image = '/images/partidos/rede.png' WHERE id = 35;
UPDATE partido SET image = '/images/partidos/pmb.png' WHERE id = 36;
UPDATE partido SET image = '/images/partidos/pnipt.png' WHERE id = 37;

