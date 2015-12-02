<?php


class OrderedList extends Widget {
	public $type = null;
	public $start = 1;
	public $reversed = false;
	public $stylePosition = null;
	
	const TYPE_DIGITAL = "1";
	const TYPE_LOWER_CASE_ALPHABET = "a";
	const TYPE_UPPER_CASE_ALPHABET = "A";
	const TYPE_ROMAN_ALPHABET = "i";

	const TYPE_DECIMAL = "decimal";
	const TYPE_LOWER_ROMAN = "lower-roman";
	const TYPE_UPPER_ROMAN = "upper-roman";
	const TYPE_LOWER_ALPHA = "lower-alpha";
	const TYPE_UPPER_ALPHA = "upper-alpha";
	const TYPE_LOWER_GREEK = "lower-greek";
	
	const STYLE_POSITION_INSIDE = "inside";
	const STYLE_POSITION_OUTSIDE = "outside";
	
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
	
		if($this->stylePosition !== null)
			$ret .= sprintf("style=\"%s\" ",
					$this->formatStyle(sprintf("list-style-position:%s;", $this->stylePosition)));
		else 
			$ret .= sprintf("style=\"%s\" ", $this->formatStyle(null));
		
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
	public $stylePosition = null;
	
	const TYPE_NONE = "none";
	const TYPE_CIRCLE = "circle";
	const TYPE_DISC = "disc";
	const TYPE_SQUARE = "square";
	const TYPE_DECIMAL = "decimal";
	const TYPE_LOWER_ROMAN = "lower-roman";
	const TYPE_UPPER_ROMAN = "upper-roman";
	const TYPE_LOWER_ALPHA = "lower-alpha";
	const TYPE_UPPER_ALPHA = "upper-alpha";
	const TYPE_LOWER_GREEK = "lower-greek";
	const TYPE_INHERIT = "inherit";
	
	const STYLE_POSITION_INSIDE = "inside";
	const STYLE_POSITION_OUTSIDE = "outside";
	
	public function __construct(){
		parent::__construct();
	}
	
	public function setDiscType()		{		$this->type = "disc"; }
	public function setSquareType()		{		$this->type = "square"; }
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
	
		$ret .= sprintf("<ul id=\"%s\" ", $this->id);
	
		if($this->stylePosition !== null)
			$ret .= sprintf("style=\"%s\" ",
					$this->formatStyle(sprintf("list-style-position:%s;", $this->stylePosition)));
		else 
			$ret .= sprintf("style=\"%s\" ", $this->formatStyle(null));
			
		
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

