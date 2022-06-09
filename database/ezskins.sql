CREATE DATABASE ezskins;

USE ezskins;

CREATE TABLE permissao(
  permissao_id INT NOT NULL auto_increment,
  nome VARCHAR(255),
  PRIMARY KEY(permissao_id)
);

CREATE TABLE usuarios (
  `idusuario` INT NOT NULL auto_increment,
  `nome` VARCHAR(45) NOT NULL,
  `sobre_nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `senha` VARCHAR(60) NOT NULL,
  `trade_link` VARCHAR(255) NOT NULL,
  `cep` VARCHAR(45) NOT NULL,
  `rua_numero` VARCHAR(255) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `pais` VARCHAR(45) NOT NULL,
  `celular` VARCHAR(45) NOT NULL,
  `permissao` INT NOT NULL,
  PRIMARY KEY (`idusuario`),
  CONSTRAINT fk_permissao FOREIGN KEY(permissao) REFERENCES permissao(permissao_id)
);

CREATE TABLE categorias(
  categorias_id INT NOT NULL auto_increment primary key,
  nome VARCHAR(255) NOT NULL
);

CREATE TABLE skins (
  `idskins` INT NOT NULL auto_increment,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  `estado` VARCHAR(255) NOT NULL,
  `foto` VARCHAR(255) NOT NULL,
  `categoria` INT NOT NULL,
  `cadastrador_por` INT NOT NULL,
  CONSTRAINT fk_categoria foreign key(categoria) references categorias(categorias_id),
  CONSTRAINT fk_usuario foreign key(cadastrador_por) references usuarios(idusuario),
  PRIMARY KEY (`idskins`)
);

CREATE TABLE compra(
  id_usuario INT NOT NULL,
  id_skin INT NOT NULL,
  data_compra timestamp NOT NULL,
  status VARCHAR(45) NOT NULL,
  constraint foreign key(id_usuario) references usuarios(idusuario),
  constraint foreign key(id_skin) references skins(idskins),
  primary key(id_usuario, id_skin)
);

INSERT INTO
  permissao(nome)
VALUES
('Super adm');

INSERT INTO
  permissao(nome)
VALUES
('Adminstrador');

INSERT INTO
  permissao(nome)
VALUES
('Cliente');