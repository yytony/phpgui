<?php


require_once __DIR__ . '/Input.php';

class Password extends Input {
	public function __construct(){
		parent::__construct();
		$this->type = "password";
	}
}