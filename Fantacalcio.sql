create database fantacalcio;
use fantacalcio;


create table import(
nome_calciatore nvarchar(100),
cognome_calciatore nvarchar(100),
ruolo_calciatore nvarchar(20),
squadra nvarchar(50)
);

create table squadra(
id int primary key,
nome nvarchar(50) not null
);

create table calciatore(
id int primary key,
nome nvarchar(100) not null,
cognome nvarchar(100) not null,
ruolo nvarchar(20) not null,
valore_iniziale int not null,
id_squadra int,
foreign key(id_squadra) references squadra(id)
);

create table giocatore(
id int primary key,
nome nvarchar(100) not null,
crediti int not null
);



create table fanta_squadra(
id int primary key,
nome nvarchar(50) not null,
id_giocatore int,
constraint fk_giocatore foreign key (id_giocatore) references giocatore(id)
);


create table fantasquadra_calciatore(
id_fantasquadra int,
id_calciatore int,
attivo bit(1),
constraint pk_fantasquadra_calciatore primary key (id_fantasquadra,id_calciatore),
foreign key (id_fantasquadra) references fanta_squadra(id),
foreign key (id_calciatore) references calciatore(id)
);



