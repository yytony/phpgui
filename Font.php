<?php

class Font {
	public $family = null; // "times sans-serif"
	public $style = null; // normal, italic , oblique
	public $weight = null;
	public $size = null;
	public $sizeUnit = 'px';
	
	// CSS 3
	public $face = null;

	const STYLE_NORMAL = "normal";
	const STYLE_ITALIC = "italic";
	const STYLE_OBLIQUE = "oblique";

	public function formatStyle(){
		$ret = "";

		if($this->family !== null)
			$ret .= sprintf("font-family:%s;", $this->family);
		if($this->style !== null)
			$ret .= sprintf("font-style:%s;", $this->style);
		if($this->weight !== null){
			if(is_int($this->weight))
				$ret .= sprintf("font-weight:%d;", $this->weight);
			else if(is_string($this->weight))
				$ret .= sprintf("font-weight:%s;", $this->weight);
		}
		if($this->size !== null && is_int($this->size))
			$ret .= sprintf("font-size:%d;", $this->size);

		return $ret;
	}
}
