use mysql::*;

mod func;
mod func_sql;

fn main() {
    let url = "mysql://root:123qwe@localhost/Stock";
    let pool = Pool::new(url).unwrap();
    let mut conn = pool.get_conn().unwrap();
    
    let mut opcao: u8 = 0;

    loop {

        func::menu();
        opcao = func::ler_int();

        match opcao {
        1 => func_sql::create(&mut conn),
        2 => func_sql::read(&mut conn),
        3 => func_sql::update(&mut conn),
        4 => func_sql::delete(&mut conn),
        5 => break,
	_ => print!(""),
        }
    }
}
