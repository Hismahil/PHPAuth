<?php
namespace PHPAuth\Controllers;

class Home extends \SlimController\SlimController{

	public function indexAction(){
		$this->render('home/index', array(
            'hello' => $_SERVER['DOCUMENT_ROOT']
        ));
	}
}