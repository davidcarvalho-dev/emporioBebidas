CREATE TABLE Usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    apelido VARCHAR(30) NOT NULL,
    usuario VARCHAR(30) NOT NULL,
    senha VARCHAR(20) NOT NULL
);

CREATE TABLE Categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE Produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    id_categorias INT NOT NULL,
    FOREIGN KEY (id_categorias) REFERENCES Categorias(id)
);

INSERT INTO Usuario (nome, apelido, usuario, senha)
VALUES ('Administrador', 'Admin',  'admin' '123');
ALTER TABLE produtos ADD preco VARCHAR(10) DEFAULT "0,00";