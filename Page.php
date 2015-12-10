<?php

require_once 'Config.php';

require_once 'Widget.php';

class Page extends Widget {
	public $title = 'MyPage';
	public $jsFiles = null;
	public $cssFiles = null;
	
	
	function __construct(){
		parent::__construct();
		$this->width = '100%';
		$this->height = '100%';
		
		global $PHPGUI_ROOT;
		echo "phpgui_root: > $PHPGUI_ROOT";
		$this->addJsFile($PHPGUI_ROOT . "/js/bootstrap.min.js");
		$this->addCssFile($PHPGUI_ROOT . "/css/bootstrap.min.css");
	}
	
	function __destruct(){
		
		if($this->jsFiles !== null)			$this->jsFiles = null;
		if($this->cssFiles !== null)			$this->cssFiles = null;
		
		parent::__destruct();
	}
	
	public function addJsFile($jsFile){
		if($this->jsFiles === null)			$this->jsFiles = array();
			array_push($this->jsFiles, $jsFile);
		return;
	}
	
	public function addCssFile($cssFile){
		if($this->cssFiles === null)			$this->cssFiles = array();
		array_push($this->cssFiles, $cssFile);
		return;
	}
	
	public function renderPage(){
		$div_str='';
		
		echo "<html>\n";
		
		echo "<head>\n";
			echo "\t<meta charset=\"utf-8\">\n";
			if($this->title !== null)
				echo sprintf("\t<title>%s</title>\n", $this->title);

			$allCssFiles = array();
			$this->collectcssFiles($allCssFiles);
			$len = count($allCssFiles);
//			print_r($allCssFiles);
			if($len > 0) {
				for($i = 0; $i < $len; $i ++){
					echo sprintf("\t<link rel=\"stylesheet\" type=\"text/css\" href=\"%s\" />\n", $allCssFiles[$i]);
				}
			}
			
			$allJsFiles = array();
			$this->collectJsFiles($allJsFiles);
			$len = count($allJsFiles);
			if($len > 0 ) {
				for($i = 0; $i < $len; $i ++){
					echo sprintf("\t<script type=\"text/javascript\" src=\"%s\" ></script>\n", $allJsFiles[$i]);
				}
			}
		echo "</head>\n";
		
		printf("<body sytle=\"font-family:'times sans-serif'\">\n");
		
//		$this->renderWidget($this, 0, $div_str);
		$this->render(0);	
		echo "</body>\n";
		echo "</html>";
	}
	
}


