<?php
namespace PHPAuth\Controllers;

class HomeController extends \SlimController\SlimController{

	public function indexAction(){

		$this->render('home/index', array(
            'hello' => $_SERVER['DOCUMENT_ROOT']."/../src/PHPAuth/Models"
        ));
	}
}