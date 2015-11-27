<?php

require_once 'Input.php';

class TextField extends Input {
	public function __construct(){
		parent::__construct();
		$this->type = "text";
	}
}