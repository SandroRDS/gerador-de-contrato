CREATE TABLE Usuario(
    idUsuario INTEGER PRIMARY KEY NOT NULL,
    nome VARCHAR(20) NOT NULL,
    sobrenome VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    cnpj VARCHAR(14) NOT NULL,
    contato VARCHAR(11) NOT NULL,
    conta_aprovada BOOLEAN NOT NULL
);