pub struct Empresa {
    id: u32,
    nome: String,
    email: String,
    senha: String,
}

pub fn menu() {
    println!("\nDigite o número corresponde:
    1 - Create
    2 - Read
    3 - Update
    4 - Delete
    5 - Fechar programa");
}