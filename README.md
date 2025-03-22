# Sistema de Gerenciamento de Produtos e Fornecedores

Este projeto é uma aplicação web simples para listar e adicionar novos jogadores, criada como parte de uma atividade prática. Está hospedada em uma instância EC2 da AWS, utilizando PHP, MySQL e Apache.

## Funcionalidades

- Cadastrar jogador (Nome, Número da camisa, Time, Posição e Idade)
- Listar joagadores com as informações do cadastro.

## Configurar Instância EC2

### Pré-requisitos

- Conta AWS
- Instância EC2 (recomendado: Amazon Linux 2023)
- Conhecimentos básicos de AWS, PHP, MySQL e Apache

### Passos para Instalação

1. *Configurar Instância EC2*:
   bash
   ##### Atualizar pacotes
   sudo dnf update -y
   
   #### Instalar o servidor web Apache
   sudo dnf install -y httpd
   sudo systemctl start httpd
   sudo systemctl enable httpd
   
   #### Instalar PHP e MySQL
   sudo dnf install -y php php-mysqlnd mysql mysql-server
   sudo systemctl start mysqld
   sudo systemctl enable mysqld
   

2. *Configurar Arquivo de Credenciais*:
   Crie o arquivo inc/dbinfo.inc com o seguinte conteúdo:
   php
   <?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'web_user');
   define('DB_PASSWORD', 'sua_senha');
   define('DB_DATABASE', 'sistema_gestao');
   ?>

### Código para criar o Banco de Dados

```sql
CREATE TABLE jogadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    numero_camisa INT NOT NULL,
    time VARCHAR(255) NOT NULL,
    posicao VARCHAR(50) NOT NULL,
    idade INT NOT NULL
);

```
   

## Vídeo Explicativo

[Clique Aqui](https://drive.google.com/file/d/1RSPtmwI8a034P6vEl0z3186oRGpYQ1t4/view?usp=sharing)


