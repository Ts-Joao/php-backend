-- Script para criação do banco de dados e tabela de funcionários
CREATE DATABASE IF NOT EXISTS `crud` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `crud`;

-- Criação da tabela funcionários
CREATE TABLE IF NOT EXISTS `funcionarios` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(150) NOT NULL,
    `setor` VARCHAR(100) NOT NULL,
    `salario` DECIMAL(10, 2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserção de dados de exemplo para teste
INSERT INTO `funcionarios` (`nome`, `setor`, `salario`) VALUES
('Ana Clara Souza', 'Tecnologia da Informação', 6500.00),
('Carlos Eduardo Lima', 'Recursos Humanos', 4200.00),
('Mariana Ferreira', 'Financeiro', 5300.00);

-- Compatibilidade caso alguém utilize a tabela no singular 'funcionario'
CREATE OR REPLACE VIEW `funcionario` AS SELECT * FROM `funcionarios`;

