CREATE DATABASE IF NOT EXISTS transporte
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE transporte;

-- ==========================
-- TABELA USUÁRIO
-- ==========================

CREATE TABLE usuario (
    idusuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha TEXT NOT NULL
);

-- ==========================
-- TABELA PASSAGEIROS
-- ==========================
,,,,,
CREATE TABLE passageiros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL
);

-- ==========================
-- TABELA ESTAÇÕES
-- ==========================

CREATE TABLE estacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_estacao VARCHAR(100) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    cidade VARCHAR(100) NOT NULL
);

-- ==========================
-- TABELA LINHAS
-- ==========================

CREATE TABLE linhas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cidade_origem VARCHAR(100) NOT NULL,
    cidade_destino VARCHAR(100) NOT NULL,
    horario_saida TIME NOT NULL,
    horario_chegada TIME NOT NULL
);

-- ==========================
-- TABELA VIAGENS
-- ==========================

CREATE TABLE viagens (
    id INT AUTO_INCREMENT PRIMARY KEY,

    id_passageiro INT NOT NULL,
    id_linha INT NOT NULL,
    id_estacao INT NOT NULL,

    data_viagem DATE NOT NULL,

    CONSTRAINT fk_viagem_passageiro
        FOREIGN KEY (id_passageiro)
        REFERENCES passageiros(id),

    CONSTRAINT fk_viagem_linha
        FOREIGN KEY (id_linha)
        REFERENCES linhas(id),

    CONSTRAINT fk_viagem_estacao
        FOREIGN KEY (id_estacao)
        REFERENCES estacoes(id)
);