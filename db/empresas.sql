CREATE TABLE empresas (
    id_empresa MEDIUMINT UNSIGNED AUTO_INCREMENT,
    email VARCHAR(60) NOT NULL UNIQUE,
    senha VARCHAR(50) NOT NULL,
        PRIMARY KEY (id_empresa)
);
