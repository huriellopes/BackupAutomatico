<?php
// Inclui o arquivo de configuração na classe
require_once __DIR__ . "/../config.php";

/**
 * Sistema de Backup Automático para ser utilizado como rotina de backup!
 * 
 * @author Huriel Lopes
 */
class Banco
{

	// Variaveis de conexão com o banco de dados
	private static $host 		= HOST; // nome do servidor ou IP
	private static $port 		= PORT; // Porta que é usada
	private static $db 			= DB; // Banco que será feita o backup
	private static $user 		= USER; // Usuário do banco
	private static $pass 		= PASS; // Senha do banco de dados
	private static $charset 	= CHARSET; // Tipo de caracter
	private static $binMySQL 	= BinMySQL; // Caminho do Mysql
	private static $destino 	= Destino; // Destino que será salvo
	private static $opcao 		= Opcao;

	// Métodos que são resposaveis por trazer o conteudo das variaveis
	private function getHost() 		{return self::$host;}
	private function getPort() 		{return self::$port;}
	private function getDB() 		{return self::$db;}
	private function getUser()		{return self::$user;}
	private function getPass()		{return self::$pass;}
	private function getCharset()	{return self::$charset;}
	private function getBinMySQL()	{return self::$binMySQL;}
	private function getDestino()	{return self::$destino;}
	private function getOpcao()		{return self::$opcao;}

	// Função responsável por executar o backup
	public function Backup()
	{
		$opcao = $this->getOpcao();

		if ($opcao == 'backup') {
			$this->backup = system($this->getBinMySQL()."mysqldump.exe -h".$this->getHost()." -u".$this->getUser()." -p".$this->getPass()." -P".$this->getPort()." ".$this->getDB()." > ".$this->getDestino().$this->getDB().".sql");
		} else if ($opcao == 'restore') {
			$this->backup = system($this->getBinMySQL()."mysql.exe -h".$this->getHost()." -u".$this->getUser()." -p".$this->getPass()." -P".$this->getPort()." ".$this->getDB()." < ".$this->getDestino().$this->getDB().".sql");
		} else {
			return false;
		}
	}
}
