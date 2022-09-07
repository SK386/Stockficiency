use std::io;
use mysql::*;
use mysql::prelude::*;

//CREATE
pub fn create() {
    let url = "mysql://root:123qwe@localhost/Stock";
    let pool = Pool::new(url).unwrap();
    let mut conn = pool.get_conn().unwrap();

    conn.exec_drop("INSERT INTO clientes (email, senha) VALUES (:a, :b)",
        params! {
            "a" => ler_string("Digite o email: "),
            "b" => ler_string("Digite a senha: ")
        }
    ).unwrap();
}

//READ
pub fn read() {
    let url = "mysql://root:123qwe@localhost/Stock";
    let pool = Pool::new(url).unwrap();
    let mut conn = pool.get_conn().unwrap();

    let res:Vec<(i32, String, String)> = conn.query("SELECT id_cliente, email, senha FROM clientes")
        .unwrap();

    for r in res {
        println!("ID: {}, EMAIL: {}, SENHA: {}", r.0, r.1, r.2);
    }

}

//UPDATE
pub fn update() {
    let url = "mysql://root:123qwe@localhost/Stock";
    let pool = Pool::new(url).unwrap();
    let mut conn = pool.get_conn().unwrap();

    conn.exec_drop("UPDATE clientes SET email=:b, senha=:c WHERE id_cliente=:a", params! {
        "a" => ler_int("Digite o ID do cliente a ser alterado"),
        "b" => ler_string("Digite o novo email: "),
        "c" => ler_string("Digite a nova senha: ")
        }).unwrap();
}

//DELETE
pub fn delete(){
    let url = "mysql://root:123qwe@localhost/Stock";
    let pool = Pool::new(url).unwrap();
    let mut conn = pool.get_conn().unwrap();

    conn.exec_drop("DELETE FROM clientes WHERE id_cliente=:a", params! {
            "a" => ler_int("Digite o ID do cliente a ser apagado")
            }).unwrap();

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


