use mysql::*;

mod persistence;
    use crate::persistence::empresa_dao::*;

mod func;

fn main() {
    let url = "mysql://win:123qwe@192.168.1.9/Stock";
    let pool = Pool::new(url).unwrap();
    let mut conn = pool.get_conn().unwrap();
    
    let mut opcao: u8;

    loop {

        func::menu();
        opcao = func::ler_int();

        match opcao {
        1 => create(&mut conn),
        2 => read(&mut conn),
        3 => update(&mut conn),
        4 => delete(&mut conn),
        5 => break,
	    _ => (),
        }
    }
}
