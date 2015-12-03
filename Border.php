<?php


class Border {
	public $color = null;
	public $width = null;
	public $style = null;
	public $outSet = false;
	public $overflow = null;
	
	//CSS 3
	public $radius = null;
	public $boxShadow = null;
	public $imageUrl = null;

	public $topColor = null;
	public $rightColor = null;
	public $bottomColor = null;
	public $leftColor = null;

	public $topWidth = null;
	public $rightWidth = null;
	public $bottomWidth = null;
	public $leftWidth = null;

	public $topStyle = null;
	public $rightStyle = null;
	public $bottomStyle = null;
	public $leftStyle = null;

	const STYLE_NONE = "none";
	const STYLE_HIDDEN = "hidden";
	const STYLE_DOTTED = "dotted";
	const STYLE_DASHED = "dashed";
	const STYLE_SOLID = "solid";
	const STYLE_DOUBLE = "double";
	const STYLE_GROOVE = "groove";
	const STYLE_RIDGE = "ridge";
	const STYLE_INSET = "inset";
	const STYLE_OUTSET = "outset";
	const STYLE_INHERIT = "inherit";
	
	const OVERFLOW_VISIBLE = "visible";
	const OVERFLOW_HIDDEN = "hidden";
	const OVERFLOW_SCROLL = "scroll";
	const OVERFLOW_AUTO = "auto";
	
	public function setRadius($r){
		if(! is_int($r)) return;
		$this->radius = $r;
	}
	
	public function setBoxShadow($topRightWidth, $bottomLeftWidh, $fog, $color){
		if(! is_int($topRightWidth) || ! is_infinite($bottomLeftWidh) || ! is_infinite($fog)
				|| ! is_string($color)) 
			return;
		
		$this->boxShadow = sprintf("box-shadow:%dpx %dpx %dpx %s;", $topRightWidth, $bottomLeftWidh, $fog, $color);
		$this->boxShadow .= sprintf("-moz-box-shadow:%dpx %dpx %dpx %s;", $topRightWidth, $bottomLeftWidh, $fog, $color);
	}
	
	public function formatStyle(){

		$squre_color_is_null = 		($this->topColor === null) && ($this->rightColor === null)
		&&  ($this->bottomColor === null) && ($this->leftColor === null) ;
		$squre_width_is_null = 		($this->topWidth === null) && ($this->rightWidth === null)
		&&  ($this->bottomWidth === null) && ($this->leftWidth === null) ;
		$squre_style_is_null = 		($this->topStyle === null) && ($this->rightStyle === null)
		&&  ($this->bottomStyle === null) && ($this->leftStyle === null) ;

		$squre_all_is_null = $squre_color_is_null && $squre_style_is_null && $squre_width_is_null;
		$all_is_null = $squre_all_is_null
		&& ($this->color === null) && ($this->width === null) && ($this->style === null)
		&& ($this->outSet === null);
		$border_is_null = $this->color === null && $this->width === null && $this->style === null;

		if($all_is_null) return ;

		$ret = '';
		if($squre_all_is_null){
			if(! $border_is_null){
				$ret .= "border:";
				if($this->width !== null && is_int($this->width))
					$ret .= sprintf("%dpx ",$this->width);
				else if($this->width !== null && is_string($this->width))
					$ret .= sprintf("%s ",$this->width);
				else
					$ret .= "0px ";
					
				if($this->style !== null && is_string($this->style)) 	$ret .= $this->style . " ";
				else													$ret .= "solid ";
				if($this->color !== null && is_string($this->color)) 	$ret .= $this->color . ";";
				else													$ret .="transparent;";
			}
		}
		else{
			if($squre_color_is_null){
				if($this->topColor !== null) 	$ret .= sprintf("border-top-color:%s;", $this->topColor);
				if($this->rightColor !== null) 	$ret .= sprintf("border-right-color:%s;", $this->rightColor);
				if($this->bottomColor !== null) $ret .= sprintf("border-bottom-color:%s;", $this->bottomColor);
				if($this->leftColor !== null) 	$ret .= sprintf("border-left-color:%s;", $this->leftColor);
			}
			if($squre_width_is_null){
				if($this->topWidth !== null) 	$ret .= sprintf("border-top-width:%s;", $this->topWidth);
				if($this->rightWidth !== null) 	$ret .= sprintf("border-right-width:%s;", $this->rightWidth);
				if($this->bottomWidth !== null) $ret .= sprintf("border-bottom-width:%s;", $this->bottomWidth);
				if($this->leftWidth !== null) 	$ret .= sprintf("border-left-width:%s;", $this->leftWidth);
			}
			if($squre_style_is_null){
				if($this->topStyle !== null) 	$ret .= sprintf("border-top-style:%s;", $this->topStyle);
				if($this->rightStyle !== null) 	$ret .= sprintf("border-right-style:%s;", $this->rightStyle);
				if($this->bottomStyle !== null) $ret .= sprintf("border-bottom-style:%s;", $this->bottomStyle);
				if($this->leftStyle !== null) 	$ret .= sprintf("border-left-style:%s;", $this->leftStyle);
			}
		}

		if($this->outSet === true )
			$ret .= "border-style:outset;";
		
		if($this->radius !== null && is_int($this->radius)){
			$ret .= sprintf("border-radius:%dpx;",$this->radius);
			$ret .= sprintf("-moz-border-radius:%dpx;",$this->radius);
			$ret .= sprintf("-webkit-border-radius:%dpx;",$this->radius);
		}
			
		if($this->imageUrl !== null && is_string($this->imageUrl)){
			$ret .= sprintf("border-image:url(%s);",$this->imageUrl);
			$ret .= sprintf("-moz-border-image:url(%s);",$this->imageUrl);
			$ret .= sprintf("-webkit-border-image:url(%s);",$this->imageUrl);
		}
		
		if($this->boxShadow !== null){
			$ret .= sprintf("box-shadow:%s;", $this->boxShadow);
		}
			
		if($this->overflow !== null){
			$ret .= sprintf("overflow:%s;", $this->overflow);
		}
		
		return $ret;
	}

}

