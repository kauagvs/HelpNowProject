    create database dbhelpnow;

    use dbhelpnow;


    create table problema_cadastro (
    idproblema int not null primary key auto_increment,
    problema varchar (256) not null,
    descricao varchar (256) not null,
    status varchar (256) not null,
    ativo int  default 1
    );