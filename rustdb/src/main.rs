use mysql::*;

mod func;
mod func_sql;


fn main() {
    let url = "mysql://win:123qwe@192.168.1.7/Stock";
    let pool = Pool::new(url).unwrap();
    let mut conn = pool.get_conn().unwrap();
    
    let mut opcao: u8 = 0;

    while opcao != 5 {

        func::menu();
        opcao = func::ler_int();

        match opcao {
        1 => func_sql::create(&mut conn),
        2 => func_sql::read(&mut conn),
        3 => func_sql::update(&mut conn),
        4 => func_sql::delete(&mut conn),
        _ => print!(""),
        }
    }
}
