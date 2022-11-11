CREATE TABLE encomendas (
    id_encomenda BIGINT UNSIGNED AUTO_INCREMENT,
    destino_inicial VARCHAR(75) NOT NULL,
    destino_final VARCHAR(75) NOT NULL,
    horário_do_envio DATETIME NOT NULL,    #'AAAA-MM-DD HH:MM:SS'
    observacao TINYTEXT,    #OPCIONAL
        PRIMARY KEY (id_encomenda),

    empresa_id MEDIUMINT UNSIGNED NOT NULL,
        FOREIGN KEY (empresa_id) REFERENCES empresas (id_empresa)
);
