use mysql::*;
use std::io::{self, Write};

mod persistence;
    use crate::persistence::*;

mod entity;
    use crate::entity::*;

fn main() {
    
    let url = "mysql://win:123qwe@192.168.1.9/Stock";

//Se uma pool conseguir ser criada sem erro, irá realizar o {} com o valor de pool 
    match Pool::new(url) {
        
        Ok(pool) => {
            if let Ok(mut conn) = pool.get_conn() {

                let tabela = escolher_tabela();

                loop {
                    match tabela {
                        1 => {
                            let opcao = empresa::menu();
                    
                            match opcao {
                                1 => empresa_dao::create(&mut conn),
                                2 => empresa_dao::read(&mut conn),
                                3 => empresa_dao::update(&mut conn),
                                4 => empresa_dao::delete(&mut conn),
                                5 => break,
                                _ => ()}
                            }

                        2 => {
                            let opcao = produto::menu();
                    
                            match opcao {
                                1 => produto_dao::create(&mut conn),
                                2 => produto_dao::read(&mut conn),
                                3 => produto_dao::update(&mut conn),
                                4 => produto_dao::delete(&mut conn),
                                5 => break,
                                _ => ()}
                        }

                        _ => break
                    }
                }
            }
        }, 
        Err(e) => eprintln!("Não foi possível estabelecer a conexão com o Banco de Dados! \n{}", e)
    }
}


pub fn escolher_tabela() -> u8 {
    print!("Alterar empresas(1) ou produtos(2): ");
        io::stdout().flush().unwrap();
    
    let mut input = String::new();
        io::stdin().read_line(&mut input).expect("Falha ao ler o input!");

    input.trim().parse::<u8>().unwrap_or_default()
}