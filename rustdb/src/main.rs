use mysql::*;
use std::io::{self, Write};

mod persistence;
    use crate::persistence::*;

mod entity;
    use crate::entity::*;

fn main() {
    let url = "mysql://win:123qwe@192.168.1.7/Stock";
    let pool = Pool::new(url).unwrap();
    let mut conn = pool.get_conn().unwrap();
    
    print!("Alterar empresas(1) ou produtos(2): ");
        io::stdout().flush().unwrap();
    let tabela = ler_u8();

    loop {
        match tabela {
            1 => {
                empresa::menu();
                let opcao = ler_u8();
        
                match opcao {
                    1 => empresa_dao::create(&mut conn),
                    2 => empresa_dao::read(&mut conn),
                    3 => empresa_dao::update(&mut conn),
                    4 => empresa_dao::delete(&mut conn),
                    5 => break,
                    _ => (),
                }
            }
            2 => {
                produto::menu();
                let opcao = ler_u8();
        
                match opcao {
                    1 => produto_dao::create(&mut conn),
                    2 => produto_dao::read(&mut conn),
                    3 => produto_dao::update(&mut conn),
                    4 => produto_dao::delete(&mut conn),
                    5 => break,
                    _ => (),
                }
            }
            _ => break, 
        }
    }
}


pub fn ler_u8() -> u8 {
    let mut n = String::new();

    io::stdin()
        .read_line(&mut n)
        .expect("Falha ao ler o input!");

    n.trim().parse::<u8>().expect("Falha ao converter o input!")
}