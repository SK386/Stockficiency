use std::io;

pub struct Produto {
    id: u32,
    codigo: String,
    nome: String,
    descricao: String,
    qtd_estoque: u32,
    preco: f64, //precisão do f64: 10000000000000.99
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
