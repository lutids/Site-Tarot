CREATE DATABASE tarot_santo;
USE tarot_santo;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    senha VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE leituras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL
);

INSERT INTO leituras (titulo) VALUES
('Cruz Celta'),
('Perguntas objetivas'),
('Tarot sim ou não'),
('3 cartas (Passado, Presente e Futuro)'),
('Templo de Afrodite');

CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    leitura_id INT,
    data_consulta DATE NOT NULL,
    horario TIME NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (leitura_id) REFERENCES leituras(id)
);
