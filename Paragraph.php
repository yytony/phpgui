<?php

class Paragraph extends Widget {
	public $text = null;
	public $textIndent = null;
	public $textAlign = null;
	public $wordSpacing = null;
	public $letterSpacing = null;
	public $textDecoration = null; // none underline  overline  line-through  blink
	public $direction = null;
	public $whiteSpace = null;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
	
		$ret .= sprintf("<p id=\"%s\" ", $this->id);
	
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle());
	
		$ret .= ">\n";
		
		if($this->text !== null && is_string($this->text))
			$ret .= $this->text . "\n";
		echo $ret;
	
//		$this->renderChildren($depth + 1);
	
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		$ret .="</p>\n";
		echo $ret;
	}
	
	
}