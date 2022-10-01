use mysql::{*, prelude::*};

//CREATE
pub fn create(conn: &mut PooledConn) {
    conn.exec_drop("INSERT INTO empresas (nome_empresa, email, senha) VALUES (:a, :b, :c)",
        params! {
            "a" => ler_input("Digite o nome: ", "---".to_string()),
            "b" => ler_input("Digite o email: ", "---".to_string()),
            "c" => ler_input("Digite a senha: ", "---".to_string())
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
        "a" => ler_input("Digite o ID da empresa", 0i32),
        "b" => ler_input("Digite o novo nome: ", "---".to_string()),
        "c" => ler_input("Digite o novo email: ", "---".to_string()),
        "d" => ler_input("Digite a nova senha: ", "---".to_string()),
        }).unwrap();
}

//DELETE
pub fn delete(conn: &mut PooledConn){
    conn.exec_drop("DELETE FROM empresas WHERE id_empresa=:a", params! {
            "a" => ler_input("Digite o ID da empresa", 0)
            }).unwrap();

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