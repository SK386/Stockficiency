CREATE TABLE produtos (
    id_produto INT UNSIGNED AUTO_INCREMENT,
    nome_produto VARCHAR(50) NOT NULL,
    qtd_estoque MEDIUMINT UNSIGNED NOT NULL,
    preco DECIMAL(9, 2) NOT NULL,	#1234567.89
    validade DATE, #'AAAA-MM-DD'
    garantia DATE, #'AAAA-MM-DD'
        PRIMARY KEY (id_produto),
    
    empresa_id MEDIUMINT UNSIGNED NOT NULL,
        FOREIGN KEY (empresa_id) REFERENCES empresas (id_empresa)
);