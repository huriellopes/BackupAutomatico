<?php

namespace Classe;

require_once __DIR__ . "/../Config/Config.php";

/**
 * Sistema de Backup Automático para ser utilizado como rotina de backup!
 * 
 * @author Huriel Lopes
 */
class Banco
{

	// Variaveis de conexão com o banco de dados
	private static $host 		= HOST; 		// nome do servidor ou IP
	private static $port 		= PORT; 		// Porta que é usada
	private static $db 			= DB; 			// Banco que será feita o backup
	private static $user 		= USER; 		// Usuário do banco
	private static $pass 		= PASS; 		// Senha do banco de dados
	private static $charset 	= CHARSET; 		// Tipo de caracter
	private static $bin 		= Bin; 			// Caminho da pasta bin do banco de dados
	private static $destino 	= Destino; 		// Destino que será salvo
	private static $banco 		= Banco;		// Banco que será utilizado para fazer o backup
	private static $opcao 		= Opcao;		// Opções: 'backup' ou 'restore'

	// Métodos que são resposaveis por trazer o conteudo das variaveis
	private function getHost() 		{return self::$host;}
	private function getPort() 		{return self::$port;}
	private function getDB() 		{return self::$db;}
	private function getUser()		{return self::$user;}
	private function getPass()		{return self::$pass;}
	private function getCharset()	{return self::$charset;}
	private function getBin()		{return self::$bin;}
	private function getDestino()	{return self::$destino;}
	private function getBanco()		{return self::$banco;}
	private function getOpcao()		{return self::$opcao;}

	// Função responsável por executar o backup
	public function Backup()
	{
		$banco = $this->getBanco();
		
		if ($banco == 'mysql') {
			$this->MySQL();
		} else if ($banco == 'pg') {
			$this->PostgreSQL();
		}
	}

	private function MySQL()
	{
		$opcao = $this->getOpcao();
		$banco = $this->getBanco();
		
		if ($opcao == 'backup') {
			if (file_exists($this->getDB().".sql")) {
				$this->backup = system($this->getBin().$this->getBanco()."dump.exe -h".$this->getHost()." -u".$this->getUser()." -p".$this->getPass()." -P".$this->getPort()." ".$this->getDB()." > ".$this->getDestino().$this->getDB().".sql");
			} else {
				echo "Excluindo o backup antigo - MySQL!\n";
				unlink($this->getDestino().$this->getDB().".sql");
				echo "********************************\n";
				echo "Fazendo um novo Backup - MySQL!\n";
				$this->backup = system($this->getBin().$this->getBanco()."dump.exe -h".$this->getHost()." -u".$this->getUser()." -p".$this->getPass()." -P".$this->getPort()." ".$this->getDB()." > ".$this->getDestino().$this->getDB().".sql");
			}
		} else if ($opcao == 'restore') {
			$this->backup = system($this->getBin().$this->getBanco().".exe -h".$this->getHost()." -u".$this->getUser()." -p".$this->getPass()." -P".$this->getPort()." ".$this->getDB()." < ".$this->getDestino().$this->getDB().".sql");
		} else {
			return false;
		}

		return $this->backup;
	}

	private function PostgreSQL()
	{
		$opcao = $this->getOpcao();
		$banco = $this->getBanco();
		
		if ($opcao == 'backup') {
			if (file_exists($this->getDB().".sql")) {
				$this->backup = system($this->getBin().$this->getBanco()."_dump.exe --host ".$this->getHost()." --port ".$this->getPort()." --username ".$this->getUser()." --file ".$this->getDestino().$this->getDB().".sql ".$this->getDB());
			} else{
				echo "Excluindo o backup antigo - PostgreSQL!\n";
				unlink($this->getDestino().$this->getDB().".sql");
				echo "*******************************\n";
				echo "Fazendo um novo Backup - PostgreSQL!\n";
				$this->backup = system($this->getBin().$this->getBanco()."_dump.exe --host ".$this->getHost()." --port ".$this->getPort()." --username ".$this->getUser()." --file ".$this->getDestino().$this->getDB().".sql ".$this->getDB());
			}
		} else if ($opcao == 'restore') {
			$this->backup = system($this->getBin().$this->getBanco()."_restore.exe --host ".$this->getHost()." --port ".$this->getPort()." --username ".$this->getUser()." --dbname ".$this->getDB()." ".$this->getDestino().$this->getDB().".sql");
		} else {
			return false;
		}

		return $this->backup;
	}

}
