<?php

require_once __DIR__ . '/Input.php';

class FileSelector extends Input {
	public function __construct(){
		parent::__construct();
		$this->type = "file";
	}
}