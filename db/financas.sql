CREATE TABLE financas (
    mes TINYINT NOT NULL,
    ano SMALLINT NOT NULL,
    ganhos INT UNSIGNED NOT NULL,
    despesas INT UNSIGNED NOT NULL,

    empresa_id MEDIUMINT UNSIGNED NOT NULL,
        FOREIGN KEY (empresa_id) REFERENCES empresas (id_empresa)
);