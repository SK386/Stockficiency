CREATE TABLE financas (
    periodo DATE NOT NULL, #'AAAA-MM-DD'
    ganhos DECIMAL(11, 2) NOT NULL, #123456789.10
    despesas DECIMAL(11, 2) NOT NULL,

    empresa_id MEDIUMINT UNSIGNED NOT NULL,
        FOREIGN KEY (empresa_id) REFERENCES empresas (id_empresa)
);