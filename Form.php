<?php


class Form extends Widget {
	public $method = 'post';
	public $action = null;
	public $name = null;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function __construct($name , $action){
		parent::__construct();
		$this->name = $name;
		$this->action = $action;
	}
	
	public function __construct($method, $name , $action){
		parent::__construct();
		$this->method = $method;
		$this->name = $name;
		$this->action = $action;
	}
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		
		$ret .= sprintf("<form id=\"%s\" ", $this->id);
		
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle());
		
		if($this->name !== null)
			$ret .= sprintf("name=\"%s\" ", $this->name);
		
		if($this->method !== 'post')
			$ret .= sprintf("method=\"%s\" ", $this->method);
		
		if($this->action !== null)
			$ret .= sprintf("name=\"%s\" ", $this->action);
		
		$ret .= ">\n";
		echo $ret;
		
		$this->renderChildren($depth + 1);
		
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		$ret .="</form>\n";
		echo $ret;
		
	}
	
}