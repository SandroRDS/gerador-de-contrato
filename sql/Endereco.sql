CREATE TABLE Endereco(
    idEndereco INTEGER PRIMARY KEY NOT NULL,
    idUsuario INTEGER NOT NULL,
    logradouro VARCHAR(50) NOT NULL,
    numero INTEGER NOT NULL,
    bairro VARCHAR(40),
    cidade VARCHAR(40),
    estado VARCHAR(19),
    cep VARCHAR(8),
    FOREIGN KEY(idUsuario) REFERENCES Usuario(idUsuario)
);