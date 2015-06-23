<?php

namespace PHPAuth\Config;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use PHPAuth\Models;

require_once "defines.php";

require_once "Group.php";
require_once "Role.php";
require_once "Session.php";
require_once "User.php";

$debug = true;
$config = Setup::createAnnotationMetadataConfiguration(array(ROOT."/../src/PHPAuth/Models"), $debug);

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