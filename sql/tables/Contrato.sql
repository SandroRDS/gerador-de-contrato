DROP TABLE Contrato;

CREATE TABLE Contrato(
    idContrato INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idUsuario INTEGER NOT NULL,
    nome VARCHAR(40) NOT NULL,
    codigo VARCHAR(13) NOT NULL,
    FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario) ON DELETE CASCADE
);