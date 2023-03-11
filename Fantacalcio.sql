create database fantacalcio;
use fantacalcio;


create table import(
nome_calciatore nvarchar(100),
ruolo_calciatore nvarchar(1),
squadra nvarchar(50),
quotazione int,
id_squadra int
);

create table squadra(
id int auto_increment primary key,
nome nvarchar(50) not null
);

create table calciatore(
id int auto_increment primary key,
nome nvarchar(100) not null,
ruolo nvarchar(20) not null,
valore_iniziale int not null,
id_squadra int,
foreign key(id_squadra) references squadra(id)
);

create table giocatore(
id int auto_increment primary key,
nome nvarchar(100) not null,
email nvarchar(100) not null,
`password` nvarchar(100) not null,
crediti int not null
);



create table fanta_squadra(
id int auto_increment primary key,
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

create table lega(
id int auto_increment primary key,
nome nvarchar(100) not null
);


create table giocatore_lega(
id_giocatore int,
id_lega int,
punti int,
constraint pk_giocatore_lega primary key(id_giocatore,id_lega),
foreign key(id_giocatore) references giocatore(id),
foreign key(id_lega) references lega(id)
);


INSERT INTO calciatore (nome,ruolo,valore_iniziale,id_squadra)
SELECT nome_calciatore,ruolo_calciatore,quotazione,id_squadra
FROM import;


create table giocatore_calciatore
(
id_giocatore int,
id_calciatore int,
id_lega int,
foreign key(id_calciatore) references calciatore(id),
foreign key(id_giocatore) references giocatore(id),
foreign key(id_lega) references lega(id)

);





select s.id 
from squadra s
inner join import i on i.squadra=s.nome
where s.nome=i.squadra;

select c.nome, c.ruolo ,s.nome
from calciatore c left join squadra s on s.id=c.id_squadra
where s.nome="Milan";







