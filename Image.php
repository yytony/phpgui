<?php


class Area {
	public $alt = null;
	public $href = null;
	private  $shape = "rect"; // circ, poly
	private  $rectCoords = null;
	private  $circleCoords = null;
	private  $ploygonCoords = null;
	
	const SHAPE_RECT = "rect";
	const SHAPE_CIRCLE = "circ";
	const SHAPE_POLYGON = "poly";
	
	public function setRectCoords($x1, $y1, $x2, $y2){
		$this->rectCoords = sprintf("%s, %s, %s, %s", $x1, $y1, $x2, $y2);
	}
	
	public function setCircleCoords($x1, $y1, $r){
		$this->shape = "circ";
		$this->circleCoords = sprintf("%s, %s, %s", $x1, $y1, $r);
	}
	public function setPolygonCoords(){
		$para_num = func_num_args();
		$para_array = func_get_args();
		
		$this->shape = "poly";
		$this->ploygonCoords = "";
		for($i = 0; $i < $para_num; $i ++){
			if(! is_int($para_array[$i]))  continue;
			
			if(($i + 1) === $para_num)
				$this->ploygonCoords .= sprintf("%d", $para_array[$i]);
			else 
				$this->ploygonCoords .= sprintf("%d, ", $para_array[$i]);
		}
	}
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		
		$ret .= sprintf("<area id=\"%s\" ", $this->id);
		
//		$ret .= sprintf("style=\"%s\" ",$this->formatStyle());
		
		$ret .= sprintf("shape=\"%s\" ", $this->shape);
		
		if($this->shape === 'rect')
			$ret .= sprintf("coords=\"%s\" ", $this->rectCoords);
		else if($this->shape === 'circ')
			$ret .= sprintf("coords=\"%s\" ", $this->circleCoords);
		else if($this->shape === 'poly')
			$ret .= sprintf("coords=\"%s\" ", $this->polygonCoords);
		
		if($this->href !== null)
			$ret .= sprintf("href=\"%s\" ", $this->href);
		
		if($this->alt !== null)
			$ret .= sprintf("alt=\"%s\" ", $this->alt);
			
		$ret .= ">\n";
		echo $ret;
		
//		$this->renderChildren($depth + 1);
		
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		$ret .="</area>\n";
		echo $ret;
		
	}
}

class Map extends Widget {
	public $name = null;
	
	public function __construct(){
		parent::__construct();	
	}
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
	
		$ret .= sprintf("<map id=\"%s\" ", $this->id);
	
//		$ret .= sprintf("style=\"%s\" ",$this->formatStyle());

		if($this->name !== null)
			$ret .= sprintf("name=\"%s\" ", $this->name);
		
		$ret .= ">\n";
		echo $ret;
		
		$this->renderChildren($depth + 1);
		
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		$ret .="</map>\n";
		echo $ret;
	}
	
}

class Image extends Widget {
	public $alt = null;
	public $src = null;
	public $useMapName = null;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
	
		$ret .= sprintf("<img id=\"%s\" ", $this->id);
	
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle(null));

		if($this->src !== null)
			$ret .= sprintf("src=\"%s\" ", $this->src);
		if($this->alt !== null)
			$ret .= sprintf("alt=\"%s\" ", $this->alt);
		if($this->useMapName !== null)
			$ret .= sprintf("usemap=\"#%s\" ", $this->useMapName);
		
		$ret .= ">\n";
		echo $ret;
		
		$this->renderChildren($depth + 1);
		
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		$ret .="</img>\n";
		echo $ret;
	}
}