<?php

class Paragraph extends Widget {
	public $text = null;
	public $textIndent = null;
	public $textAlign = null; // left right center justify inherit
	public $wordSpacing = null;
	public $letterSpacing = null; 
	public $textDecoration = null; // none underline  overline  line-through  blink
	public $direction = null;  //ltr  rtl
	public $whiteSpace = null; // normal pre nowrap pre-wrap pre-line
	
	// CSS 3
	public $textShadow = null;
	public $wordWrap = null;

	const TEXT_ALIGN_LEFT  = "left";
	const TEXT_ALIGN_RIGHT  = "right";
	const TEXT_ALIGN_CENTER  = "center";
	const TEXT_ALIGN_JUSTIFY  = "justify";
	const TEXT_ALIGN_INHERIT  = "inherit";
	
	const TEXT_DECORATION_NONE = "none";
	const TEXT_DECORATION_UNDERLINE = "underline";
	const TEXT_DECORATION_OVERLINE = "overline";
	const TEXT_DECORATION_LINE_THROUGH = "line-through";
	const TEXT_DECORATION_BLINK = "BLINK";
	
	const TEXT_DIRECTION_LEFT_TO_RIGHT = "ltr";
	const TEXT_DIRECTION_RIGHT_TO_LEFT = "rtl";
	
	const TEXT_WHITE_SPACE_NOMAL = "normal";
	const TEXT_WHITE_SPACE_PRE = "pre";
	const TEXT_WHITE_SPACE_NO_WRAP = "nowrap";
	const TEXT_WHITE_SPACE_PRE_WRAP = "pre-wrap";
	const TEXT_WHITE_SPACE_PRE_LINE = "pre-line";
	
	public function __construct(){
		parent::__construct();
	}
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
	
		$ret .= sprintf("<p id=\"%s\" ", $this->id);
	
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle(null));
	
		if($this->textIndent !== null){
			if( is_int($this->textIndent))
				$ret .= sprintf("text-indent:%dem; ", $this->textIndent);
			else if(is_string($this->textIndent))
				$ret .= sprintf("text-indent:%s; ", $this->textIndent);
		}
		
		if($this->textAlign !== null)
			$ret .= sprintf("text-align:%s; ", $this->textAlign);
		
		if($this->wordSpacing !== null)
			$ret .= sprintf("word-spacing:%dpx; ", $this->wordSpacing);
		
		if($this->letterSpacing !== null)
			$ret .= sprintf("letter-spacing:%dpx; ", $this->letterSpacing);
		
		if($this->textDecoration !== null)
			$ret .= sprintf("text-decoration:%s; ", $this->textDecoration);
		
		if($this->direction !== null)
			$ret .= sprintf("direction:%s; ", $this->direction);
		
		if($this->whiteSpace !== null)
			$ret .= sprintf("white-space:%s; ", $this->whiteSpace);
		
		
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