<?php


require_once 'Widget.php';

class Button extends Widget {
	
	public function __construct(){
		parent::__construct();
		$this->width = 50;
		$this->height = 30;
		$this->background->color = '#909090';
		$this->border->color = '#808080';
		$this->border->width = "3px";
		$this->border->outSet = true;	
	}
	
}