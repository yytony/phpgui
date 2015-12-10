<?php



class Canvas extends Widget {

	public function __construct(){
		parent::__construct();
	}
	
	public function render($depth){
		$ret = "";
		$ret .= $this->indentDepth($depth);
	
		$ret .= sprintf("<canvas id=\"%s\" class=\"%s\" ", $this->id, $this->class);
	
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle(null));
	
		$ret .= $this->formatJsListeners();
	
		$ret .= ">\n";
		echo $ret;
	
		$ret .= $this->formatJsCode($depth);
	
		$this->renderChildren($depth + 1);
	
		$ret = "";
		$ret .= $this->indentDepth($depth);
		$ret .="</canvas>\n";
		echo $ret;
	}
	
	
}