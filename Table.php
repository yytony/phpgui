<?php


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
		
		$p_num = func_num_args();
		$p0 = func_get_arg(0);
		if($p0 !== null)
			$this->addChild($p0);
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

		$p_num = func_num_args();
		$p0 = func_get_arg(0);
		if($p0 !== null)
			$this->addChild($p0);
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
	}
	
	public function render($depth){
		$ret = "";
		$ret .= $this->indentDepth($depth);
	
		$ret .= sprintf("<table id=\"%s\" class=\"%s\" ", $this->id, $this->class);
	
		$ret .= sprintf("style=\"%s\" ",$this->formatStyle(null));
	
		$ret .= sprintf("border-collapse:%s;", $this->borderCollapse);
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
