use std::io;
use mysql::*;
use mysql::prelude::*;

//CREATE
pub fn create(conn: &mut PooledConn) {
    conn.exec_drop("INSERT INTO produtos (codigo_produto, nome_produto, descricao_produto, qtd_estoque, preco) VALUES (:a, :b, :c, :d, :e)",
        params! {
            "a" => ler_string("Digite o código: "),
            "b" => ler_string("Digite o nome: "),
            "c" => ler_string("Digite a descrição: "),
            "d" => ler_int("Digite a quantidade em estoque: "),
            "e" => ler_float("Digite o preço: ")
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
        "a" => ler_string("Digite o código do produto"),
        "b" => ler_string("Digite o novo nome: "),
        "c" => ler_string("Digite a nova descrição: "),
        "d" => ler_int("Digite a quantidade em estoque: "),
        "e" => ler_float("Digite o preço: ")
        }
    ).unwrap();
}

//DELETE
pub fn delete(conn: &mut PooledConn){
    conn.exec_drop("DELETE FROM produtos WHERE codigo_produto=:a", params! {
            "a" => ler_string("Digite o código do produto")
            }
        ).unwrap();

}


//FUNCOES DE LEITURA
fn ler_string(texto: &str) -> String {
    let mut n = String::new();

    println!("{}", texto);

    io::stdin()
        .read_line(&mut n)
        .expect("Falha ao ler o input!");

    n.trim().to_string()
}

fn ler_int(texto: &str) -> i32 {
    let mut n = String::new();

    println!("{}", texto);

    io::stdin()
        .read_line(&mut n)
        .expect("Falha ao ler o input!");

    n.trim().parse::<i32>().expect("Falha ao converter o input!")
}

fn ler_float(texto: &str) -> f64 {
    let mut n = String::new();

    println!("{}", texto);

    io::stdin()
        .read_line(&mut n)
        .expect("Falha ao ler o input!");

    n.trim().parse::<f64>().expect("Falha ao converter o input!")
}