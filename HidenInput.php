<?php


require_once 'Input.php';

class HidenInput extends Input {
	public function __construct(){
		parent::__construct();
		$this->type = "hiden";
	}
}