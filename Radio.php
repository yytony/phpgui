<?php


require_once 'Input.php';

class Radio extends Input {
	public function __construct(){
		parent::__construct();
		$this->type = "radio";
	}
	
	
}