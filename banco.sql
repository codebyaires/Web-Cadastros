-- ============================================
-- BANCO DE DADOS — Projeto SENAI
-- Script de criação do banco e das tabelas
-- ============================================

-- 1. Criar o banco de dados do projeto (caso não exista)
CREATE DATABASE IF NOT EXISTS projeto
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

-- 2. Selecionar o banco para os próximos comandos
USE projeto;

-- ============================================
-- TABELA 1: usuario (Acesso ao Sistema)
-- ============================================
CREATE TABLE IF NOT EXISTS usuario (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  nome       VARCHAR(100) NOT NULL,
  email      VARCHAR(100) NOT NULL UNIQUE,
  senha      VARCHAR(255) NOT NULL,
  criado_em  DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserir um usuário de teste (Admin)
-- Senha: 123456 (criptografada com password_hash)
INSERT INTO usuario (nome, email, senha) VALUES (
  'Administrador',
  'admin@email.com',
  '$2y$10$Wiyq0IuO9JEW2K5rakVjDu/SUE/ZCkdiw0dWs.4ZNKy7U/hrLvFxa'
);

-- ============================================
-- TABELA 2: cliente (Dados dos Clientes)
-- ============================================
-- Remove a tabela se ela já existir para recriar limpa
DROP TABLE IF EXISTS cliente;

CREATE TABLE cliente (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  nome       VARCHAR(100) DEFAULT NULL,
  telefone   VARCHAR(20) DEFAULT NULL,
  email      VARCHAR(100) DEFAULT NULL,
  cpf        VARCHAR(20) DEFAULT NULL,
  endereco   VARCHAR(255) DEFAULT NULL,
  foto       VARCHAR(255) DEFAULT NULL, -- Coluna para salvar o nome da imagem
  criado_em  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ============================================
-- TABELA 3: produto (Estoque)
-- ============================================
-- Remove a tabela se ela já existir para recriar limpa
DROP TABLE IF EXISTS produto;

CREATE TABLE produto (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  nome       VARCHAR(255) NOT NULL,
  quantidade INT NOT NULL DEFAULT 0,
  valor      DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
  criado_em  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;