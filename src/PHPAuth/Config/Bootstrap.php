<?php

namespace PHPAuth\Config;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use PHPAuth\Models;

class Bootstrap {
	
	private static $instance;
	private $em;

	private function __construct(){}

	public static function getInstance(){
		if(!isset(self::$instance)){
			$inst = __CLASS__;
			self::$instance = new $inst;
		}

		return self::$instance;
	}

	public function em(){
		$debug = true;
		$config = Setup::createAnnotationMetadataConfiguration(array($_SERVER['DOCUMENT_ROOT']."/../src/PHPAuth/Models"), $debug);

		// Configuração de acesso ao banco de dados
		$conn = array(
				'driver' => 'pdo_mysql',
				'host' => 'localhost',
				'user' => 'vagrant',
				'password' => 'vagrant',
				'dbname' => 'php_auth'
		);

		if(!isset($this->em))
			$this->em = \Doctrine\ORM\EntityManager::create($conn, $config);
		
			
		return $this->em;
	}	
}
