<?php


require_once 'Widget.php';

class Label extends Widget {
	public $text = '';
	public $hyperlink = null;
	
	public function render($depth){
		$class_name = get_class($this);
//		echo "class name : $class_name";
		
		$div_str = "";
		for($i = 0; $i < $depth; $i++)
			$div_str .= "    ";
		
		$div_str .= "<a id=\"" . $this->id . "\" "
			."class=\"" . $this->class . "\" "
			."style=\"" . $this->formatStyle()
			;
	
		$div_str .= "\" "; // end of style attribute
		
		if($this->hyperlink !== null && is_string($this->hyperlink))
			$div_str .= sprintf("href=\"%s\" ", $this->hyperlink);
		
		$div_str .= ">" . $this->text . "\n";
		echo "$div_str";

		$this->renderChildren($depth + 1);
				
		$div_str = "";
		for($i = 0; $i < $depth; $i++)
			$div_str .= "    ";
		
		$div_str .="</a>\n";
		echo "$div_str";
		
	}
}