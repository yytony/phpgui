<?php



class TextArea extends  Widget {
	public $name = null;
	public $rows = 2;
	public $cols = 32;
	public $readonly = false;
	//html5
	public $form = null;
	public $maxLength = null;
	public $wrap = 'hard';  // soft
	
	const WRAP_HARD = "hard";
	const WRAP_SOFT = "soft";
	
	public function __construct(){
		parent::__construct();
	}
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
	
		$ret .= sprintf("<textarea id=\"%s\" ", $this->id);
	
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle(null));
	
		if($this->name !== null)
			$ret .= sprintf("name=\"%s\" ", $this->name);

		$ret .= sprintf("rows=\"%d\" ", $this->rows);
		$ret .= sprintf("cols=\"%d\" ", $this->cols);
		
		if($this->readonly !== false)
			$ret .= sprintf("readonly=\"readonly\" ");
	
		if($this->form !== null)
			$ret .= sprintf("form=\"%s\" ", $this->form);
		
		if($this->maxLength !== null)
			$ret .= sprintf("maxlength=\"%d\" ", $this->maxLength);
		
		$ret .= sprintf("wrap=\"%s\" ", $this->wrap);
		
		$ret .= ">\n";
		echo $ret;
	
		$this->renderChildren($depth + 1);
	
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		$ret .="</textarea>\n";
		echo $ret;
	}
	
}