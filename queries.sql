-- create database sistema_provas;

use sistema_provas;

-- criação da tabela de usuários
create table usuarios(
	usuario_id int not null primary key auto_increment,
    usuario_nome varchar(255) not null,
    usuario_email varchar(255) not null,
    usuario_senha varchar(255) not null,
    usuario_rg varchar(255) not null,
    usuario_cpf varchar(255) not null,
    usuario_data_cadastro datetime not null
);
-- criação da tabela de professores
create table professores(
	professor_id int not null primary key auto_increment,
    usuario_id int not null,
    constraint fk_professor_usuario_id foreign key(usuario_id) references usuarios(usuario_id)
);
-- criação da tabela de alunos
create table alunos(
	aluno_id int not null primary key auto_increment,
    aluno_ra varchar(255) not null,
    usuario_id int not null,
    constraint fk_aluno_usuario_id foreign key(usuario_id) references usuarios(usuario_id)
);
insert into usuarios(usuario_nome, usuario_email, usuario_senha, usuario_rg, usuario_cpf, usuario_data_cadastro)
values('Gabriel', 'gabriel@gmail.com', '8833f1325fb6341757b30f6de91487a5', '20.819.357-1', '862.699.360-98', now());
insert into alunos(aluno_ra, usuario_id) values('65.876.543-98', 1);
insert into usuarios(usuario_nome, usuario_email, usuario_senha, usuario_rg, usuario_cpf, usuario_data_cadastro)
values('Maria', 'maria@gmail.com', '8833f1325fb6341757b30f6de91487a5', '20.819.321-1', '462.679.360-98', now());
insert into alunos(aluno_ra, usuario_id) values('65.876.533-91', 2);
insert into usuarios(usuario_nome, usuario_email, usuario_senha, usuario_rg, usuario_cpf, usuario_data_cadastro)
values('Pedro', 'pedro@gmail.com', 'd3ce9efea6244baa7bf718f12dd0c331', '20.819.321-2', '462.679.360-21', now());
insert into professores(usuario_id) values(3);