<?php

require_once __DIR__ . '/Widget.php';

class TableHead extends  Widget {
	
}

class TableBody extends Widget {
	
}

class TableFoot extends Widget{
	
}

////////////////////////////////////////////////////////////////////////////

class TableHeadCell extends Widget {
	public $colspan = null;
	public $rowspan = null;
	public $align = null;
	public $valign = null; // vertical align
	
	public function __construct(){
		parent::__construct();
		$this->position = Widget::POSITION_RELATIVE;
		
		$p_num = func_num_args();
		for($i = 0; $i < $p_num; $i ++){
			$p = func_get_arg($i);
			if($p !== null && is_object($p))
				$this->addChild($p);
		}
				
	}
	
	public function render($depth){
		$ret = "";
		$ret .= $this->indentDepth($depth);
	
		$ret .= sprintf("<th id=\"%s\" class=\"%s\" ", $this->id, $this->class);
	
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle(null));
	
		$ret .= $this->formatJsListeners();
	
		$ret .= ">\n";
		echo $ret;
	
		$ret .= $this->formatJsCode($depth);
	
		$this->renderChildren($depth + 1);
	
		$ret = "";
		$ret .= $this->indentDepth($depth);
		$ret .="</th>\n";
		echo $ret;
	}
	
}

class TableDataCell extends  Widget {
	public function __construct(){
		parent::__construct();
		$this->border->color = "#606060";
		$this->border->style = Border::STYLE_SOLID;
		$this->border->width = "1px";
		$this->position = Widget::POSITION_RELATIVE;

		$p_num = func_num_args();
		for($i = 0; $i < $p_num; $i ++){
			$p = func_get_arg($i);
			if($p !== null && is_object($p))
				$this->addChild($p);
		}
	}
	
	public function render($depth){
		$ret = "";
		$ret .= $this->indentDepth($depth);
	
		$ret .= sprintf("<td id=\"%s\" class=\"%s\" ", $this->id, $this->class);
	
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle(null));
	
		$ret .= $this->formatJsListeners();
	
		$ret .= ">\n";
		echo $ret;
	
		$ret .= $this->formatJsCode($depth);
	
		$this->renderChildren($depth + 1);
	
		$ret = "";
		$ret .= $this->indentDepth($depth);
		$ret .="</td>\n";
		echo $ret;
	}
	
}

class TableRow extends Widget {
	
	
	public function __construct(){
		parent::__construct();
		$this->position = Widget::POSITION_RELATIVE;
	
		$p_num = func_num_args();
		for($i = 0; $i < $p_num; $i ++){
			$p = func_get_arg($i);
			if($p !== null && is_object($p))
				$this->addChild($p);
		}
	}
	
	public function render($depth){
		$ret = "";
		$ret .= $this->indentDepth($depth);
	
		$ret .= sprintf("<tr id=\"%s\" class=\"%s\" ", $this->id, $this->class);
	
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle(null));
	
		$ret .= $this->formatJsListeners();
	
		$ret .= ">\n";
		echo $ret;
	
		$ret .= $this->formatJsCode($depth);
	
		$this->renderChildren($depth + 1);
	
		$ret = "";
		$ret .= $this->indentDepth($depth);
		$ret .="</tr>\n";
		echo $ret;
	}
	
}


class Table extends Widget {
	public $borderCollapse = "collapse";
	
	public function __construct(){
		parent::__construct();
		$this->position = Widget::POSITION_RELATIVE;
		
		$p_num = func_num_args();
		for($i = 0; $i < $p_num; $i ++){
			$p = func_get_arg($i);
			if($p !== null && is_object($p))
				$this->addChild($p);
		}
	}
	
	public function render($depth){
		$ret = "";
		$ret .= $this->indentDepth($depth);
	
		$ret .= sprintf("<table id=\"%s\" class=\"%s\" ", $this->id, $this->class);
	
		$ext_style = "" . sprintf("border-collapse:%s;", $this->borderCollapse);
		$ext_style .= "border:1px solid #606060;padding:3px;text-align:center;";
		
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle($ext_style));
	
		$ret .= $this->formatJsListeners();
	
		$ret .= ">\n";
		echo $ret;
	
		$ret .= $this->formatJsCode($depth);
	
		$this->renderChildren($depth + 1);
	
		$ret = "";
		$ret .= $this->indentDepth($depth);
		$ret .="</table>\n";
		echo $ret;
	}
}
