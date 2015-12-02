<?php

class SelectOption extends Widget {
	public $optionValue = null;
	public $displayText = null;
	public $disabled = false;
	public $selected = false;
	
	// IE7+
	public $label = null;
	
	public function __construct(){
		parent::__construct();
	}	
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		
		$ret .= sprintf("<option id=\"%s\" ", $this->id);
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle());
		
		if($this->optionValue !== null)
			$ret .= sprintf("value=\"%s\" ", $this->optionValue);		
		
		if($this->disabled === true)
			$ret .= sprintf("disabled=\"disabled\" ");
		
		if($this->selected === true)
			$ret .= sprintf("selected=\"selected\" ");
		
		$ret .= ">";
		
		if($this->displayText !== null)
			$ret .= $this->displayText;		
		
		echo $ret;
		
//		$this->renderChildren($depth + 1);
		
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		$ret .="</option>\n";
		echo $ret;
	}
	
}

class OptionGroup extends  Widget {
	public $label = null;
	public $disabled = false;
	
	public function __construct(){
		parent::__construct();
	}	
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		
		$ret .= sprintf("<optgroup id=\"%s\" ", $this->id);
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle(null));
		
		if($this->disabled === true)
			$ret .= sprintf("disabled=\"disabled\" ");
		
		if($this->label !== null)
			$ret .= sprintf("label=\"%s\" ", $this->label);		
		
		$ret .= ">";
		echo $ret;
		
		$this->renderChildren($depth + 1);
		
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		$ret .="</optgroup>\n";
		echo $ret;
	}
}

class DropList extends Widget {
	public $name = null;
	public $form = null;
	public $multiple = false;
	public $size = 0 ;
	

	public function __construct(){
		parent::__construct();
	}	
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
	
		$ret .= sprintf("<select id=\"%s\" ", $this->id);
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle(null));
	
		if($this->disabled === true)
			$ret .= sprintf("disabled=\"disabled\" ");
	
		if($this->multiple === true)
			$ret .= sprintf("multiple=\"multiple\" ");
		
		if($this->name !== null)
			$ret .= sprintf("name=\"%s\" ", $this->name);
	
		if($this->form !== null)
			$ret .= sprintf("form=\"%s\" ", $this->form);
		
		if($this->size !== 0)
			$ret .= sprintf("size=\"%d\" ", $this->size);
		
		$ret .= ">";
		echo $ret;
	
		$this->renderChildren($depth + 1);
	
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		$ret .="</select>\n";
		echo $ret;
	}	
}