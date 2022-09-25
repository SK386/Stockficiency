use std::io;
use mysql::*;
use mysql::prelude::*;

//CREATE
pub fn create(conn: &mut PooledConn) {
    conn.exec_drop("INSERT INTO empresas (nome_empresa, email, senha) VALUES (:a, :b, :c)",
        params! {
            "a" => ler_string("Digite o nome: "),
            "b" => ler_string("Digite o email: "),
            "c" => ler_string("Digite a senha: ")
        }
    ).unwrap();
}

//READ
pub fn read(conn: &mut PooledConn) {
    let res:Vec<(i32, String, String, String)> = conn.query("SELECT id_empresa, nome_empresa, email, senha FROM empresas")
        .unwrap();

    for r in res {
        println!("ID: {}, NOME: {}, EMAIL: {}, SENHA: {}", r.0, r.1, r.2, r.3);
    }

}

//UPDATE
pub fn update(conn: &mut PooledConn) {
    conn.exec_drop("UPDATE empresas SET nome_empresa=:b, email=:c, senha=:d WHERE id_empresa=:a", params! {
        "a" => ler_int("Digite o ID da empresa"),
        "b" => ler_string("Digite o novo nome: "),
        "c" => ler_string("Digite o novo email: "),
        "d" => ler_string("Digite a nova senha: ")
        }).unwrap();
}

//DELETE
pub fn delete(conn: &mut PooledConn){
    conn.exec_drop("DELETE FROM empresas WHERE id_empresa=:a", params! {
            "a" => ler_int("Digite o ID da empresa")
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


