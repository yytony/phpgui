<?php

require_once 'Input.php';

class CheckBox extends Input {
	public $text = "option_1";
	
	public function __construct(){
		parent::__construct();
		$this->type = "checkbox";
	}
	
	
}