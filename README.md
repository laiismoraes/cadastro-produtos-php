# 🛒 Cadastro de Produtos

Projeto desenvolvido em **PHP** para realizar o cadastro de produtos utilizando **MySQL**.

## 📌 Sobre o projeto

O sistema possui um formulário para cadastrar produtos informando:

* Nome do produto
* Preço

Antes de salvar os dados, o sistema realiza validações para garantir que o nome não esteja vazio e que o preço seja um número maior que zero.

## ⚙️ Tecnologias utilizadas

* PHP
* MySQL
* HTML
* MySQLi
* Apache

## 🗃️ Banco de dados

O projeto utiliza o banco de dados `exercicio` e a tabela `produtos`.

```sql
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);
```

## ✅ Validações

O sistema verifica:

* Se o nome do produto foi preenchido.
* Se o preço é um número.
* Se o preço é maior que zero.

Quando os dados são válidos, o produto é cadastrado e aparece a mensagem:

> Produto cadastrado com sucesso!

Caso contrário, uma mensagem de erro é exibida.

## 👩‍💻 Desenvolvido por

**Laís Moraes**
