use std::io;

pub fn menu() {
    println!("\nO que você deseja fazer?
    1 - Create
    2 - Read
    3 - Update
    4 - Delete
    5 - Fechar programa");
}

pub fn ler_int() -> u8 {
    let mut n = String::new();

    io::stdin()
        .read_line(&mut n)
        .expect("Falha ao ler o input!");

    n.trim().parse::<u8>().expect("Falha ao converter o input!")
}
