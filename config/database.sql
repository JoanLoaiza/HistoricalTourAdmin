create database if not exists `turismo` default character set utf8 collate utf8_general_ci;

use `turismo`;


--Tabla de empresas
create table if no exists `empresa` (
    `id_empresa` int(11) not null auto_increment,
    `nit` bigint not null,
    `nombre_empresa` varchar(50) not null,
    `email` varchar(50) not null,
    `password` varchar(255) not null,
)


--Tabla de turistas
create table if not exists `turistas` (
    `id_turista` int(11) not null auto_increment,
    `nombrecompleto` varchar(50) not null,
    `tipo_documento` varchar(50) not null,
    `identificacion` varchar(50) not null,
    `proveniencia` varchar(50) not null,
    `email` varchar(50) not null,
    `fecha_ingreso` date not null,
    `fecha_salida` date not null,
    `medio_transporte` varchar(50) not null,
    `equipamento` varchar(50) not null,
    `tipo_viaje` varchar(50) not null,
    `lugar_residencia` varchar(50) not null,
    `id_empresa` int(11) not null,
    primary key (`id_turista`),
    foreign key (`id_empresa`) references `empresa` (`id_empresa`)
    );
