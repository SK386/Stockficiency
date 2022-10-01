use mysql::{*, prelude::*};

//CREATE
pub fn create(conn: &mut PooledConn) {
    conn.exec_drop("INSERT INTO produtos (codigo_produto, nome_produto, descricao_produto, qtd_estoque, preco) VALUES (:a, :b, :c, :d, :e)",
        params! {
            "a" => ler_input("Digite o código: ", "---".to_string()),
            "b" => ler_input("Digite o nome: ", "---".to_string()),
            "c" => ler_input("Digite a descrição: ", "---".to_string()),
            "d" => ler_input("Digite a quantidade em estoque: ", 0i32),
            "e" => ler_input("Digite o preço: ", 0.0f64)
        }
    ).unwrap();
}

//READ
pub fn read(conn: &mut PooledConn) {
    let res:Vec<(String, String, String, i32, f64)> = conn.query("SELECT codigo_produto, nome_produto, descricao_produto, qtd_estoque, preco FROM produtos")
        .unwrap();

    for r in res {
        println!("COD: {}, NOME: {}, DESC: {}, Qtd: {}, PREÇO: {}", r.0, r.1, r.2, r.3, r.4);
    }

}

//UPDATE
pub fn update(conn: &mut PooledConn) {
    conn.exec_drop("UPDATE produtos SET nome_produto=:b, descricao_produto=:c, qtd_estoque=:d, preco=:e WHERE codigo_produto=:a", params! {
        "a" => ler_input("Digite o código do produto", "---".to_string()),
        "b" => ler_input("Digite o novo nome: ", "---".to_string()),
        "c" => ler_input("Digite a nova descrição: ", "---".to_string()),
        "d" => ler_input("Digite a quantidade em estoque: ", 0i32),
        "e" => ler_input("Digite o preço: ", 0.0f64)
        }
    ).unwrap();
}

//DELETE
pub fn delete(conn: &mut PooledConn){
    conn.exec_drop("DELETE FROM produtos WHERE codigo_produto=:a", params! {
            "a" => ler_input("Digite o código do produto", "---".to_string())
            }
        ).unwrap();

}


//FUNCAO DE LEITURA
fn ler_input<T: std::str::FromStr>(texto: &str, padrao: T) -> T {

    println!("{}", texto);

    let mut input = String::new();
        std::io::stdin().read_line(&mut input).expect("Falha ao ler o input!");

    match input.trim().parse::<T>() {
        Ok(input) => input,
        Err(_) => padrao
    }
}