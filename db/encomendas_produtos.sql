CREATE TABLE encomendas_produtos (
    encomenda_id BIGINT UNSIGNED NOT NULL,
    produto_id INT UNSIGNED NOT NULL,
        FOREIGN KEY (encomenda_id) REFERENCES encomendas (id_encomenda),
        FOREIGN KEY (produto_id) REFERENCES produtos (id_produto),
    
    quantidade MEDIUMINT UNSIGNED NOT NULL
);