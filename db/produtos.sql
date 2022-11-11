CREATE TABLE produtos (
    id_produto INT UNSIGNED AUTO_INCREMENT,
    codigo_produto VARCHAR(9) NOT NULL UNIQUE,	#ABC 000 000
    nome_produto VARCHAR(50) NOT NULL,
    qtd_estoque MEDIUMINT UNSIGNED NOT NULL,
    preco DECIMAL(9, 2) NOT NULL,	#1234567.89
        PRIMARY KEY (id_produto)
);
