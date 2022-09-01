CREATE TABLE clientes_produtos (
    cliente_id INT(5) NOT NULL,
    produto_id INT(6) NOT NULL,
        FOREIGN KEY (cliente_id) REFERENCES clientes (id_cliente),
        FOREIGN KEY (produto_id) REFERENCES produtos (id_produto)
);
