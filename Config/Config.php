<?php
/**
 * O Sistema de Backup Automático foi feito para aqueles que necessitam colocar um rotina de backup na empresa ou seja lá o que onde for, atualmente é possivel fazer backup dos bancos: MySQL e PostgreSQL, você deverá preencher os dados abaixo para dá continuidade ao processo de backup, lembrando que o seguinte sistema também faz restauração de backup!
 *
 * Dados que será precisos para preencher:
 * [Host] 		= nome do servidor ou IP
 * [Port] 		= Porta do banco de dados, caso seja mysql = 3307. Caso seja PostgreSQL = 5432
 * [DB]			= Banco de dados que será feito o backup
 * [User] 		= Usuário do banco de dados
 * [Pass] 		= Senha do banco de dados
 * [Charset] 	= Caracter UTF-8
 * [Bin] 		= Caminho da pasta bin do banco de dados que deseja utilizar
 * [Destino] 	= Caminho de destino que será salvo o backup do banco
 * [Banco]		= Tipo de banco que vai ser feito o backup. Ex.: pg ou mysql
 * [Opcao]		= Opções 'backup' ou 'restore'
 *
 * @author Huriel Lopes
 */
define("HOST", 'localhost');
define("PORT", '');
define("DB", '');
define("USER", 'root');
define("PASS", '');
define("CHARSET", 'utf-8');
define("Bin", '');
define("Destino", 'C:/backup/');
define("Banco", 'mysql');
define("Opcao", 'backup');