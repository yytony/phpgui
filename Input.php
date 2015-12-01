<?php

require_once 'Widget.php';

class Input extends Widget {
	public $type = null;
	public $name = null;
	public $value = null;
	public $maxLength = 32;
	public $readOnly = FALSE;
	public $size = 32;
	public $src = null;
	public $imageWidth = null;
	
	public $accept = null;
	public $alt = null;
	public $align = "middle"; // left right top middle bottom
	public $checked = false;
	public $disabled = false;
	
	public $form = null;
	public $formAction = null;
	public $formMethod = null;
	
	public function __construct(){
		parent::__construct();
	}

	public function render($depth){
		$this->renderInput($depth, null);
	}
	
	public function renderInput($depth, $spicific_attrs){
		if($this->type === null)	return;
	
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
	
	
		$ret .= sprintf("<input type=\"%s\" ", $this->type);
	
		if($this->name !== null && is_string($this->name))
			$ret .= sprintf("name=\"%s\" ", $this->name);
	
		if($this->value !== null && is_string($this->value))
			$ret .= sprintf("value=\"%s\" ", $this->value);
	
		if($this->type === "text" || $this->type === "password"){
			if($this->maxLength !== null && is_int($this->maxLength)){
				$ret .= sprintf("maxlength=\"%d\" ", $this->maxLength);
			}
			else{
				if($this->size !== null && is_int($this->size))
					$ret .= sprintf("size=\"%d\" ", $this->size);
			}
		}
	
		if($this->type === "image"){
			if($this->src !== null && is_string($this->src))
				$ret .= sprintf("src=\"%s\" ",$this->src);
			
			if($this->alt !== null && is_string($this->alt))
				$ret .= sprintf("alt=\"%s\" ",$this->alt);
				
			if($this->align !== null && is_string($this->align))
				$ret .= sprintf("align=\"%s\" ",$this->align);
				
			// html5 attributes
			$this->width = 32;
			$this->height = 16;
			$ret .= sprintf("width=\"%d\" ",$this->width);
		}

		if($this->type === "file"){
			if($this->accept !== null && is_string($this->accept))
				$ret .= sprintf("accept=\"%s\" ",$this->accept);
		}
		
		if($this->type === "checkbox" || $this->type === "radio"){
			if($this->checked === true)
				$ret .= sprintf("checked=\"checked\" ");
		}
		
		if($this->type !== "hiden"){
			if($this->disabled === true)
				$ret .= sprintf("disabled=\"disabled\" ");
		}
		
		// html5
		if($this->form !== NULL && is_string($this->form))
			$ret .= sprintf("form=\"%s\" ", $this->form);
		if($this->formAction !== NULL && is_string($this->formAction))
			$ret .= sprintf("formaction=\"%s\" ", $this->formAction);
		if($this->formMethod !== NULL && is_string($this->formMethod))
			$ret .= sprintf("formmethod=\"%s\" ", $this->formMethod);
		
		// for subclass to render spicific attributes
		if($spicific_attrs !== null)		$ret .= $spicific_attrs . " ";
		
		$ret .= sprintf("style=\"%s\" ", parent::formatStyle());
		
		$ret .= ">\n";
		echo $ret;
		
		$this->renderChildren($depth + 1);
		
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		echo $ret . "</input>\n";
		
	}
	
}