<?php


require_once __DIR__ . '/Input.php';

class Button extends Input {
	public $bindFormAction = null;
	
	public function __construct(){
		parent::__construct();
		$this->type = "submit";
		$this->width = 50;
		$this->height = 30;
		$this->background->color = '#909090';
		$this->border->color = '#808080';
		$this->border->width = "3px";
		$this->border->outSet = true;
		$this->value = "OK";	
	}
	
	public function bindFormAction($formId, $action){
		if($action === null || $formId === null)	return ;
		
		$this->bindFormAction = sprintf(" onClick=\"document.getElementById('%s').setAttribute('action', '%s');\" " 
								, $formId, $action);
		
		
	}
	
	public function render($depth){
		if($this->bindFormAction !== null){
			$this->renderInput($depth, $this->bindFormAction);
		}
		else{ 
			$this->renderInput($depth, null);
		}
	}
}