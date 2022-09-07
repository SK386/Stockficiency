mod func;
mod func_sql;


fn main() {
    let mut opcao: u8 = 0;

    while opcao != 5 {

        func::menu();
        opcao = func::ler_int();

        match opcao {
        1 => func_sql::create(),
        2 => func_sql::read(),
        3 => func_sql::update(),
        4 => func_sql::delete(),
        _ => print!(""),
        }
    }
}
