use std::io;

pub struct Empresa {
    id: u32,
    nome: String,
    email: String,
    senha: String,
}

pub fn menu() -> u8 {
    println!("\nDigite o número corresponde:
    1 - Create
    2 - Read
    3 - Update
    4 - Delete
    5 - Fechar programa");

    let mut n = String::new();
        io::stdin().read_line(&mut n).expect("Falha ao ler o input!");

    n.trim().parse::<u8>().expect("Falha ao converter o input!")
}
