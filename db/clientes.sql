CREATE TABLE clientes (
    id_cliente INT(7) AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(50) NOT NULL,
        PRIMARY KEY (id_cliente)
);
