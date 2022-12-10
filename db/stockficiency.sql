CREATE TABLE empresas (
    id_empresa MEDIUMINT UNSIGNED AUTO_INCREMENT,
    email VARCHAR(60) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
        PRIMARY KEY (id_empresa)
);

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

CREATE TABLE encomendas (
    id_encomenda BIGINT UNSIGNED AUTO_INCREMENT,
    origem VARCHAR(75) NOT NULL,
    destino VARCHAR(75) NOT NULL,
    horario_do_envio DATETIME NOT NULL,    #'AAAA-MM-DD HH:MM:SS'
    observacao TINYTEXT,    #OPCIONAL
        PRIMARY KEY (id_encomenda),

    empresa_id MEDIUMINT UNSIGNED NOT NULL,
        FOREIGN KEY (empresa_id) REFERENCES empresas (id_empresa)
);

CREATE TABLE encomendas_produtos (
    encomenda_id BIGINT UNSIGNED NOT NULL,
    produto_id INT UNSIGNED NOT NULL,
        FOREIGN KEY (encomenda_id) REFERENCES encomendas (id_encomenda),
        FOREIGN KEY (produto_id) REFERENCES produtos (id_produto),
    
    quantidade MEDIUMINT UNSIGNED NOT NULL
);

CREATE TABLE financas (
    periodo DATE NOT NULL, #'AAAA-MM-DD'
    ganhos DECIMAL(11, 2) NOT NULL, #123456789.10
    despesas DECIMAL(11, 2) NOT NULL,

    empresa_id MEDIUMINT UNSIGNED NOT NULL,
        FOREIGN KEY (empresa_id) REFERENCES empresas (id_empresa)
);