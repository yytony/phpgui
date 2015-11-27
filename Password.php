<?php


require_once 'Input.php';

class Password extends Input {
	public function __construct(){
		parent::__construct();
		$this->type = "password";
	}
}