create table cliente(
    codigo int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(50) not null,
    cpf varchar(20) not null,
    rg varchar(20) not null,
    cep varchar(20) not null,
    numero varchar(10) not null,
	celular varchar(20) not null,
    email varchar(40) not null
);

create table funcionario(
    codigo int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(50) not null,
    cpf varchar(20) not null,
    rg varchar(20) not null,
    dtAdmissao date not null,
    vlSalario float(7,2) not null,
    cep varchar(20) not null,
    numero varchar(10) not null,
	celular varchar(20) not null,
    email varchar(40) not null
);

create table fornecedor(
    codigo int PRIMARY KEY AUTO_INCREMENT,
    nmEmpresa varchar(50) not null,
    nmContato varchar(50) not null,
    produto varchar(20) not null,
    cnpj varchar(20) not null,
    ie varchar(20) not null,
    cep varchar(20) not null,
    numero varchar(10) not null,
	celular varchar(20) not null,
    email varchar(40) not null
);

create table produto(
    codigo int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(50) not null,
    vlPreco float(7,2) not null,
    qtEstoque int not null
);

create table usuario(
    codigo int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(50) not null,
    login varchar(20) not null,
    email varchar(40) not null
);