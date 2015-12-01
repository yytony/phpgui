<?php 

require_once 'Config.php';

class Pen {
	
}

class Font {
	public $family = null; // "times sans-serif"
	public $style = null; // normal, italic , oblique
	public $weight = null;
	public $size = null;
	public $sizeUnit = 'px';
	
	public function formatStyle(){
		$ret = "";
		
		if($this->family !== null)
			$ret .= sprintf("font-family:%s;", $this->family);
		if($this->style !== null)
			$ret .= sprintf("font-style:%s;", $this->style);
		if($this->weight !== null){
			if(is_int($this->weight))
				$ret .= sprintf("font-weight:%d;", $this->weight);
			else if(is_string($this->weight))
				$ret .= sprintf("font-weight:%s;", $this->weight);
		}
		if($this->size !== null && is_int($this->size))
			$ret .= sprintf("font-size:%d;", $this->size);

		return $ret;
	}
}


class Background {
	public $color = null;
	public $padding = null;
	public $margin = null;
	public $image = null;
	public $position = null;
	public $repeat = null;
	
	public function formatStyle(){
		$ret = '';
		
		if($this->color !== null && is_string($this->color))
			$ret .= "background-color:" . $this->color . ";";
		if($this->padding !== null){
			if(is_int($this->padding)) 					$ret .= sprintf("padding:%dpx;", $this->padding);
			else if(is_string($this->padding)) 			$ret .= sprintf("padding:%s;", $this->padding);
		}
		
		if($this->margin !== null){
			if(is_int($this->margin)) 					$ret .= sprintf("margin:%dpx;", $this->margin);
			else if(is_string($this->margin)) 			$ret .= sprintf("margin:%s;", $this->margin);
		}
		
		if($this->image !== null)
			$ret .= sprintf("background-image:url(%s);", $this->image);
			
		if($this->repeat !== null)
			$ret .= sprintf("background-repeat:%s;", $this->repeat);
		
		return $ret;
	}
}

class Border {
	public $color = null;
	public $width = null;
	public $style = null;
	public $outSet = false;
	
	public $topColor = null;
	public $rightColor = null;
	public $bottomColor = null;
	public $leftColor = null;
	
	public $topWidth = null;
	public $rightWidth = null;
	public $bottomWidth = null;
	public $leftWidth = null;
	
	public $topStyle = null;
	public $rightStyle = null;
	public $bottomStyle = null;
	public $leftStyle = null;
	
	public function formatStyle(){
		
		$squre_color_is_null = 		($this->topColor === null) && ($this->rightColor === null) 
								&&  ($this->bottomColor === null) && ($this->leftColor === null) ;
		$squre_width_is_null = 		($this->topWidth === null) && ($this->rightWidth === null)
								&&  ($this->bottomWidth === null) && ($this->leftWidth === null) ;
		$squre_style_is_null = 		($this->topStyle === null) && ($this->rightStyle === null)
								&&  ($this->bottomStyle === null) && ($this->leftStyle === null) ;
		
		$squre_all_is_null = $squre_color_is_null && $squre_style_is_null && $squre_width_is_null;
		$all_is_null = $squre_all_is_null 
						&& ($this->color === null) && ($this->width === null) && ($this->style === null)
						&& ($this->outSet === null);
		$border_is_null = $this->color === null && $this->width === null && $this->style === null;
		
		if($all_is_null) return ;
		
		$ret = '';
		if($squre_all_is_null){
			if(! $border_is_null){
				$ret .= "border:";
				if($this->width !== null && is_int($this->width))	
					$ret .= sprintf("%dpx ",$this->width);
				else if($this->width !== null && is_string($this->width))	
					$ret .= sprintf("%s ",$this->width);
				else 												
					$ret .= "0px ";
					
				if($this->style !== null && is_string($this->style)) 	$ret .= $this->style . " ";
				else													$ret .= "solid ";
				if($this->color !== null && is_string($this->color)) 	$ret .= $this->color . ";";
				else													$ret .="transparent;";
			}
		}
		else{
			if($squre_color_is_null){
				if($this->topColor !== null) 	$ret .= sprintf("border-top-color:%s;", $this->topColor);
				if($this->rightColor !== null) 	$ret .= sprintf("border-right-color:%s;", $this->rightColor);
				if($this->bottomColor !== null) $ret .= sprintf("border-bottom-color:%s;", $this->bottomColor);
				if($this->leftColor !== null) 	$ret .= sprintf("border-left-color:%s;", $this->leftColor);
			}
			if($squre_width_is_null){
				if($this->topWidth !== null) 	$ret .= sprintf("border-top-width:%s;", $this->topWidth);
				if($this->rightWidth !== null) 	$ret .= sprintf("border-right-width:%s;", $this->rightWidth);
				if($this->bottomWidth !== null) $ret .= sprintf("border-bottom-width:%s;", $this->bottomWidth);
				if($this->leftWidth !== null) 	$ret .= sprintf("border-left-width:%s;", $this->leftWidth);
			}
			if($squre_style_is_null){
				if($this->topStyle !== null) 	$ret .= sprintf("border-top-style:%s;", $this->topStyle);
				if($this->rightStyle !== null) 	$ret .= sprintf("border-right-style:%s;", $this->rightStyle);
				if($this->bottomStyle !== null) $ret .= sprintf("border-bottom-style:%s;", $this->bottomStyle);
				if($this->leftStyle !== null) 	$ret .= sprintf("border-left-style:%s;", $this->leftStyle);
			}
		}
		
		if($this->outSet === true )
			$ret .= "border-style:outset;";
		
		return $ret;
	}
	
}

class FireAction {
	public $url = null;
	private $paramters = null;
	public $hash = null;
	
	public function setParameter($key, $val){
		if($this->paramters === null)		$this->paramters = array();
		
		if(is_string($key) && is_string($val)) 
			$this->paramters[$key]=$val;
	}
	
	
	public function formatFireAction(){
		if($this->url === null )			return;
		
		if(! is_string($this->url))			return;
		
		$hostDomain = $_SERVER['SERVER_NAME'];
		if(is_string($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] !== '80')
			$hostDomain .= ":" . $_SERVER['SERVER_PORT'];
		
		$ret = $this->url;

		if($this->paramters !== null){
			$ret .= "?";
			$keys = array_keys($this->paramters);
			$len = count($keys);
			$i = 0;			
			foreach ($keys as $k){
				$ret .= sprintf("%s=%s", $this->paramters[$i]);
				if($i < $len)
					$ret .="&&";
				$i ++;
			}
		}
		
		if($this->hash !== null && is_string($this->hash)){
			$ret .= "#" . $this->hash;
		}
		
		return $ret;
	}
}

class Widget {
	public $id=null;
	public $class = null;
	public $widgetType = null;
	
	public $color = '#d0d0d0';
	public $width = 0;
	public $height = 0;
	public $x = 0;
	public $y = 0;
	public $z = 0;
	
	public $background = null;
	public $border = null;
	public $font = null;
	public $cssFiles = null;
	public $jsFiles = null;
	public $jsListeners = null;
	public $jsCode = null;
	public $style = null;
		
	public $parent = null;
	public $children = null;
	
	public $fireAction = null;
	
	public function __construct(){
		if($this->border === null)    		$this->border = new Border();
		if($this->background === null)    	$this->background = new Background();
		if($this->font === null)    		$this->font = new Font();
		if($this->fireAction === null)		$this->fireAction = new FireAction();
		
		$this->widgetType = get_class($this);
		
	}
	
	public function __destruct(){
		if($this->border !== null)    		$this->border = null;
		if($this->background !== null)    	$this->background = null;
		if($this->font !== null)    		$this->font = null;
		if($this->children !== null)		$this->children = null;
		if($this->fireAction !== null)		$this->fireAction = null;
	}
	
	public function addChild($c){
		
		if($c === null) return;
		if($this->children === null) $this->children = array();

		array_push($this->children, $c);
		$c->parent = $this;
	}
	
	public function removeChild($c){
		
	}
	
	public function addJsFile($jsf){
		if($this->jsFiles === null)			$this->jsFiles = array();
		array_push($this->jsFiles, $jsf);
		return;
	}
	
	public function addCssFile($cssf){
		if($this->cssFiles === null)			$this->cssFiles = array();
		array_push($this->cssFiles, $cssf);
		return;
	}
	
	public function collectJsFiles($jsFilesRet){
		if($jsFilesRet === null)	return;
		
		if($this->jsFiles !== null){
			foreach($this->jsFiles as $jsf){
				array_push($jsFilesRet, $jsf);
			}
		}

		if($this->children !== null){
			$len = count($this->children);
			for($i = 0; $i < $len; $i ++){
				$c = $this->children[$i];
				$c->collectJsFiles($jsFilesRet);
			}			
		}
		return $jsFilesRet;
	}
	
	public function collectcssFiles($cssFilesRet){
		if($cssFilesRet === null)	return;
		
		if($this->cssFiles !== null){
			foreach($this->cssFiles as $cssf){
				array_push($cssFilesRet, $cssf);
			}
		}

		if($this->children !== null){
			$len = count($this->children);
			for($i = 0; $i < $len; $i ++){
				$c = $this->children[$i];
				$c->collectcssFiles($cssFilesRet);
			}			
		}
		return $cssFilesRet;
	}
	
	public function addJsListener($event, $jsCode){
		if(! is_string($event) || ! is_string($jsCode))	return ;
		
		if($this->jsListeners === null)  $this->jsListeners = array();
		
		$oldJsCode = $this->jsListeners[$event];
		if($oldJsCode === null)		$oldJsCode = "";
		
		$this->jsListeners[$event] = $oldJsCode . $jsCode;
		return;
	}
	
	public function addJsCode($jsCode){
		if($this->jsCode === null)	$this->jsCode = "";
		
		$this->jsCode .= $jsCode;
	}
	
	public function formatStyle(){
		$ret = 'position:absolute;';
		$ret .= $this->background->formatStyle();
		$ret .= $this->border->formatStyle();
		
		if(is_int($this->y) && $this->y !== 0)
			$ret .= sprintf("top:%dpx;", $this->y);
		if(is_int($this->x) && $this->x !== 0)
			$ret .= sprintf("left:%dpx;", $this->x);
		
		if(is_int($this->width) && $this->width !== 0)
			$ret .= sprintf("width:%dpx;", $this->width);
		else if(is_string($this->width))
			$ret .= sprintf("width:%s;", $this->width);
		else{}
		
		if(is_int($this->height) && $this->height !== 0)
			$ret .= sprintf("height:%dpx;", $this->height);
		else if(is_string($this->height))
			$ret .= sprintf("height:%s;", $this->height);
		else{}
		
		$ret .= $this->font->formatStyle();
		return $ret;
	}
	
	public function renderChildren($c_depth){
		if($this->children === null) return;
		
		$len = count($this->children);
		for($i = 0; $i < $len; $i ++){
			$c = $this->children[$i];
			$c->render($c_depth);
		} 
		return;
	}
	
	public function indentDepth($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		return $ret;	
	}
	
	public function formatJsListeners(){
		$ret = "";
		if($this->jsListeners !== null){
			$keys = array_keys($this->jsListeners);
			$len = count($keys);
				
			if($len > 0){
				foreach($keys as $key){
					$ret .= sprintf("%s=\"%s\" ", $key, $this->jsListeners[$key]);
				}
			}
		}
		return $ret;
	}
	
	public function formatJsCode($depth){
		$ret = "";
		if($this->jsCode !== null){
			$ret .= indentDepth($depth) . sprintf("<script type=\"text/javascript\">\n%s\n", $this->jsCode);
			$ret .= indentDepth($depth) . "</script>\n";
		}
		return $ret;
	}
	
	public function render($depth){
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		
		$ret .= sprintf("<div id=\"%s\" class=\"%s\" ", $this->id, $this->class);

		$ret .= sprintf("style=\"%s\" ",$this->formatStyle());
		
		$ret .= $this->formatJsListeners();
		
		$ret .= ">\n";
		echo $ret;
		
		$ret .= $this->formatJsCode($depth);
				
		$this->renderChildren($depth + 1);
		
		$ret = "";
		for($i = 0; $i < $depth; $i ++)		$ret .= "    ";
		$ret .="</div>\n";
		echo $ret;
	}
	
}