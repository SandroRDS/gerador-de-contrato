DROP TABLE endereco;

CREATE TABLE Endereco(
    idEndereco INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    logradouro VARCHAR(100) NOT NULL,
    numero INTEGER NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    estado VARCHAR(2) NOT NULL,
    cep VARCHAR(8) NOT NULL,
    referencia VARCHAR(30)
);