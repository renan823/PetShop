create database veterinario;
use veterinario;
create table pet(
    id integer primary key auto_increment,
    nome varchar(100) not null,
    descricao varchar(300) not null,
    telTutor char(11) not null,
    dataCadastro datetime
);
create table cuidador(
    id integer primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null unique,
    dataCadastro datetime
);
create table cuidar(
    idPet integer,
    idCuidador integer,
    foreign key(idPet) references pet(id),
    foreign key(idCuidador) references cuidador(id),
    primary key(idPet, idCuidador)
);


select * from cuidador;
select * from pet;
select c.* from cuidadro
