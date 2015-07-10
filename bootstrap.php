<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use PHPAuth\Models;

require_once "src/PHPAuth/Models/Role.php";
require_once "src/PHPAuth/Models/Group.php";
require_once "src/PHPAuth/Models/User.php";
require_once "src/PHPAuth/Models/Session.php";

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
$entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);