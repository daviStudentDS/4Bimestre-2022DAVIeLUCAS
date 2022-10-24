create database db_busca;
use db_busca;

create table tbl_empregos(
	registro int primary key,
    nome varchar(80) not null,
    cargo varchar(20) not null,
    area varchar(25) not null,
    salario decimal(10,2) not null,
    eStatus varchar(8) not null
);

delimiter $$
create procedure sp_searchByName(pNome varchar(80))
begin
select * from tbl_empregos where nome LIKE concat("%", pNome, "%");
end
$$
delimiter $$
create procedure sp_searchByCargoArea(pcargo varchar(20), parea varchar(25))
begin
select * from tbl_empregos where cargo = pcargo and area = parea;
end
$$
delimiter ;

select * from tbl_empregos;

call sp_searchByCargoArea("Gerente", "Financeiro");
