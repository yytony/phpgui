<?php


require_once __DIR__ . '/Widget.php';

class Label extends Widget {
	public $text = '';
	public $href = null;
	
	public function __construct(){
		parent::__construct();
		
		$p_num = func_num_args();
		for($i = 0; $i < $p_num; $i ++){
			$p = func_get_arg($i);
			if($p !== null && is_string($p))
				$this->text = $p;
		}
	}
	
	public function render($depth){
		$class_name = get_class($this);
//		echo "class name : $class_name";
		
		$ret = "";
		for($i = 0; $i < $depth; $i++)
			$ret .= "    ";
		
		$ret .= "<a id=\"" . $this->id . "\" "
			."class=\"" . $this->class . "\" "
			."style=\"" . $this->formatStyle(null)
			;
	
		$ret .= "\" "; // end of style attribute
		
		if($this->href !== null && is_string($this->href))
			$ret .= sprintf("href=\"%s\" ", $this->href);
		
		$ret .= ">" . $this->text . "\n";
		echo "$ret";

		$this->renderChildren($depth + 1);
				
		$ret = "";
		for($i = 0; $i < $depth; $i++)
			$ret .= "    ";
		
		$ret .="</a>\n";
		echo "$ret";
		
	}
}