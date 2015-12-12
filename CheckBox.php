<?php

require_once __DIR__ . '/Input.php';

class CheckBox extends Input {
	public $text = "option_1";
	
	public function __construct(){
		parent::__construct();
		$this->type = "checkbox";
	}
	
	
}