<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use PHPAuth\Models;

$debug = true;
$config = Setup::createAnnotationMetadataConfiguration(array("src/PHPAuth/Models"), $debug);

// Configuração de acesso ao banco de dados
$conn = array(
		'driver' => 'pdo_mysql',
		'host' => 'localhost',
		'user' => 'vagrant',
		'password' => 'vagrant',
		'dbname' => 'php_auth'
);

// Obtendo uma instância do Entity Manager
return \Doctrine\ORM\EntityManager::create($conn, $config);
