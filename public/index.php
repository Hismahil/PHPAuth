<?php
//mostrar erros no navegador
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

require '../vendor/autoload.php';

// init app
$app = New \SlimController\Slim(array(
    'templates.path'             => '../src/PHPAuth/Views',
    'controller.class_prefix'    => '\\PHPAuth\\Controllers',
    'controller.method_suffix'   => 'Action',
    'controller.template_suffix' => 'html'
));

// monolog logger 
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('php-auth');
    $log->pushHandler(new \Monolog\Handler\StreamHandler('../logs/php-auth.log', \Monolog\Logger::DEBUG));
    return $log;
});

// config views
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../src/PHPAuth/Views/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());


$app->addRoutes(array(
    '/'                 => 'HomeController:index',
    '/roles/index'      => 'RolesController:index',
    '/roles/new'        => 'RolesController:new',
    '/roles/create'     => array('post' => array('RolesController:create', function() {
        error_log("Roles create /roles/create");
    })),
    '/roles/:id'        => 'RolesController:show',
    '/roles/:id/update'     => array('put' => array('RolesController:update', function() {
        error_log("Roles update /roles/update");
    })),
    '/roles/:id/edit'   => 'RolesController:edit'
));

$app->run();