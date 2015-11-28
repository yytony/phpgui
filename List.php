<?php


class OrderedList extends Widget {
	public $type = null;
	public $start = 1;
	public $reversed = false;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function setDigitalType(){
		$this->type = "1";
	}
	public function setLowerCaseAlphabetType(){
		$this->type = "a";
	}
	public function setUpperCaseAlphabetType(){
		$this->type = "A";
	}
	public function setRomanAlphabetType(){
		$this->type = "i";
	}
	public function  setStart($st){
		if(! is_int($st))	return;
		
		$this->start = $st;
	}
	
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
	
		$ret .= sprintf("<ol id=\"%s\" ", $this->id);
	
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle());
	
		$ret .= sprintf("start=\"%d\" ", $this->start);
		
		if($this->reversed !== false)
			$ret .= sprintf("reversed=\"reversed\" ");
	
		$ret .= ">\n";
		echo $ret;
	
		$this->renderChildren($depth + 1);
	
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		$ret .="</ol>\n";
		echo $ret;
	}
}


class UnOrderedList extends Widget {
	public $type = 'circle'; // disc, square

	public function __construct(){
		parent::__construct();
	}
	
	public function setDiscType()		{		$this->type = "disc"; }
	public function setSquareType()		{		$this->type = "square"; }
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
	
		$ret .= sprintf("<ul id=\"%s\" ", $this->id);
	
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle());
	
		
		if($this->type !== 'circle')
			$ret .= sprintf("type=\"%s\" ", $this->type);
	
		$ret .= ">\n";
		echo $ret;
	
		$this->renderChildren($depth + 1);
	
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		$ret .="</ul>\n";
		echo $ret;
	}
}

