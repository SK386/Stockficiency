pub struct Empresa {
    id: u32,
    nome: String,
    email: String,
    senha: String,
}

pub struct Produto {
    id: u32,
    codigo: String,
    nome: String,
    descricao: String,
    qtd_estoque: u32,
    preco: f64, //precisão do f64: 10000000000000.99
}