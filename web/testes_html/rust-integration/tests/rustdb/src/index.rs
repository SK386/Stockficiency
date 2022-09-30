//PRODUTOS
pub fn create_p(conn: &mut PooledConn, cod: String, nome: String, estoque: u32, preco: f64) {
    conn.exec_drop("INSERT INTO produtos (codigo_produto, nome_produto, qtd_estoque, preco) VALUES (:a, :b, :c, :d)",
        params! {
            "a" => cod,
            "b" => nome,
            "c" => estoque,
            "d" => preco
        }
    ).unwrap();
}

pub fn read_p(conn: &mut PooledConn) -> Vec<(String, String, i32, f64)> {
    let res:Vec<(String, String, i32, f64)> = conn.query("SELECT codigo_produto, nome_produto, qtd_estoque, preco FROM produtos")
        .unwrap();

    res
}

pub fn update_p(conn: &mut PooledConn, cod: String, nome: String, estoque: u32, preco: f64) {
    conn.exec_drop("UPDATE produtos SET nome_produto=:b, qtd_estoque=:c, preco=:d WHERE codigo_produto=:a", params! {
        "a" => cod,
        "b" => nome,
        "c" => estoque,
        "d" => preco
        }
    ).unwrap();
}

pub fn delete_p(conn: &mut PooledConn, cod: String){
    conn.exec_drop("DELETE FROM produtos WHERE codigo_produto=:a", params! {
            "a" => cod
            }
        ).unwrap();

}
