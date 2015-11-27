<?php

require_once 'Input.php';

class CheckBox extends Input {
	public function __construct(){
		parent::__construct();
		$this->type = "checkbox";
	}
}