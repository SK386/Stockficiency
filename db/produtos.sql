CREATE TABLE produtos (
    id_produto INT(7) AUTO_INCREMENT,
    nome_produto VARCHAR(255) NOT NULL UNIQUE,
    descricao_produto VARCHAR(255),
    qtd_estoque INT(9) NOT NULL,
    preco DECIMAL(9, 2) NOT NULL,   #1234567.89
        PRIMARY KEY (id_produto)
);
