<?php


require_once 'Widget.php';

class Label extends Widget {
	public $text = '';
	public $href = null;
	
	public function render($depth){
		$class_name = get_class($this);
//		echo "class name : $class_name";
		
		$ret = "";
		for($i = 0; $i < $depth; $i++)
			$ret .= "    ";
		
		$ret .= "<a id=\"" . $this->id . "\" "
			."class=\"" . $this->class . "\" "
			."style=\"" . $this->formatStyle()
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