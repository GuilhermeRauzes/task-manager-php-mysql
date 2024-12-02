# Gerenciador de Tarefas - Projeto de Faculdade

Este é um simples gerenciador de tarefas feito com PHP e MySQL, desenvolvido como parte de um projeto de faculdade. Ele permite criar, editar e excluir tarefas, com autenticação simples de usuários.

## Requisitos

- PHP 7.x ou superior
- MySQL ou MariaDB
- XAMPP ou qualquer servidor local com suporte a PHP e MySQL

## Como rodar o projeto

### 1. **Clone o repositório**:
   Clone este repositório para o seu computador utilizando o Git:

   ```bash
   git clone https://github.com/GuilhermeRauzes/ProjetoFullStack.git

2. Configuração do Banco de Dados
O projeto utiliza um banco de dados MySQL chamado ProjetoFacul, com duas tabelas principais: users (para armazenar os dados de login dos usuários) e tasks (para armazenar as tarefas dos usuários).

Passo 1: Criar o Banco de Dados
Abra o MySQL Workbench ou qualquer cliente MySQL de sua preferência.
Execute o seguinte comando para criar o banco de dados:
sql
Copiar código
CREATE DATABASE ProjetoFacul;
Passo 2: Criar as Tabelas
Depois de criar o banco de dados, crie as tabelas users e tasks. Execute os seguintes comandos SQL:

sql
Copiar código
-- Tabela de Usuários
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Tabela de Tarefas
CREATE TABLE `tasks` (
  `task_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `task` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`task_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
Essas duas tabelas são essenciais para o funcionamento do sistema. A tabela users armazena os dados de login (nome de usuário e senha), enquanto a tabela tasks guarda as tarefas associadas a cada usuário.
