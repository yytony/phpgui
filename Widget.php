<?php 

require_once __DIR__ . '/Font.php';
require_once __DIR__ . '/Border.php';


class Pen {
	
}



class Background {
	public $color = null;
	public $padding = null;
	public $margin = null;
	public $image = null;
	public $position = null;
	public $repeat = null;
	public $attachment = null; // "scroll" fixed
	
	// CSS 3
	public $size = null;
	public $origin = null;
	
	const REPEAT_X = "repeat-x";
	const REPEAT_Y = "repeat-y";
	const REPEAT_NO = "no-repeat";
	
	const POSITION_LEFT = "left";
	const POSITION_RIGHT = "right";
	const POSITION_TOP = "top";
	const POSITION_BOTTOM = "bottom";
	const POSITION_CENTER = "center";
	
	const ATTACHMENT_SCROLL = "scroll";
	const ATTACHMENT_FIXED = "fixed";
	
	const ORIGIN_CONTENT_BOX = "content_box";
	const ORIGIN_PADDING_BOX = "padding_box";
	const ORIGIN_BORDER_BOX = "border_box";
	
	
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
		
		if($this->attachment !== null)
			$ret .= sprintf("background-attachment:%s;", $this->attachment);
		
		if($this->origin !== null){
			$ret .= sprintf("background-origin:%s;",$this->origin);
			$ret .= sprintf("-webkit-background-origin:%s;",$this->origin);
		}
		
		return $ret;
	}
}


class FireAction {
	public $url = null;
	protected  $paramters = null;
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
	public $float = null;
	public $position = null;
	
	public $background = null;
	public $border = null;
	public $font = null;
	public $cssFiles = null;
	public $jsFiles = null;
	public $jsListeners = null;
	public $jsCode = null;
//	public $style = null;

	// CSS 3
	protected  $transform = null;
	protected  $transition = null;
	public $columnCount = null;
	public $columnRule = null;
	public $columnGap = null;
	public $columnFill =null;
	public $columnWidth = null;
	public $resize = false;
		
	public $parent = null;
	protected  $children = null;
	
	public $fireAction = null;
	private $priv = "ThisIsPrivateValue";
	
	const FLOAT_NONE = "none";
	const FLOAT_LEFT = "left";
	const FLOAT_RIGHT = "right";
	const FLOAT_INHERIT = "inherit";
	
	const POSITION_ABSOLUTE = "absolute";
	const POSITION_RELATIVE = "relative";
	
	public function  getPriv(){return $this->priv; }
	public function  setPriv($s) { $this->priv = $s;}
	
	public function __construct(){
		if($this->border === null)    		$this->border = new Border();
		if($this->background === null)    	$this->background = new Background();
		if($this->font === null)    		$this->font = new Font();
		if($this->fireAction === null)		$this->fireAction = new FireAction();
		
		$this->widgetType = get_class($this);
		
		$p_num = func_num_args();
		for($i = 0; $i < $p_num; $i ++){
			$p = func_get_arg($i);
			if($p !== null && is_object($p))
				$this->addChild($p);
		}
		
	}
	
	public function __destruct(){
		if($this->border !== null)    		$this->border = null;
		if($this->background !== null)    	$this->background = null;
		if($this->font !== null)    		$this->font = null;
		if($this->children !== null)		$this->children = null;
		if($this->fireAction !== null)		$this->fireAction = null;
	}
	
	public function getClass()			{  return get_class($this);	}
	public function getParentClass()	{  return get_parent_class($this);	}
	
	public function set($key, $val){
		$ClassName = $this->getClass();
		$count = 0;
		while($ClassName !== null && is_string($ClassName)){
			$reflect = new ReflectionClass($ClassName);
			$has_prop = $reflect->hasProperty($key);
			if($has_prop === true){
				$prop = $reflect->getProperty($key);
				if($prop->isStatic())
					$prop->setValue($val);
				else {
//					echo "set $key = $val<br/>";
					$prop->setAccessible(true);
					$prop->setValue($this, $val);
				}
				break;		
			}
			else{
				$ClassName = $this->getParentClass();
				$reflect = null;
				
				$count ++ ;
				if($count > 20) break;
				continue;
			}
			
		}// while

		return $this;
	}
	
	public function addChild($c){
		
		if($c === null) return;
		if($this->children === null) $this->children = array();

		array_push($this->children, $c);
		$c->parent = $this;
	}
	
	public function removeChild($c){
		
	}
	
	public function addChildren(){
		$p_num = func_num_args();
		for($i = 0; $i < $p_num; $i ++){
			$p = func_get_arg($i);
			if($p !== null && is_object($p))
				$this->addChild($p);
		}
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
	
	public function collectJsFiles(&$jsFilesRet){
		if($jsFilesRet === null)	return;
		
		if($this->jsFiles !== null){
			foreach($this->jsFiles as $jsf){
//				echo ">> push js file: $jsf<br/>";
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
	
	public function collectcssFiles(&$cssFilesRet){
		if($cssFilesRet === null)	return;
		
		if($this->cssFiles !== null){
			foreach($this->cssFiles as $cssf){
//				echo ">> push css file: $cssf<br/>";
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
	
	public function rotate($degree){
		if(! is_int($degree)) return;
		
		$rotate_str = sprintf("transform:rotate(%ddeg);",$degree);
		$rotate_str .= sprintf("-ms-transform:rotate(%ddeg);",$degree);
		$rotate_str .= sprintf("-moz-transform:rotate(%ddeg);",$degree);
		$rotate_str .= sprintf("-webkit-transform:rotate(%ddeg);",$degree);
		
		if($this->transform === null)
			$this->transform = $rotate_str;
		else 
			$this->transform .= $rotate_str;
	}
	
	public function translate($x, $y){
		if(! is_int($x) || ! is_int($y)) return;
		
		$translate_str = sprintf("transform:translate(%dpx, %dpx);",$x, $y);
		$translate_str .= sprintf("-ms-transform:translate(%dpx, %dpx);",$x, $y);
		$translate_str .= sprintf("-moz-transform:translate(%dpx, %dpx);",$x, $y);
		$translate_str .= sprintf("-webkit-transform:translate(%dpx, %dpx);",$x, $y);
		
		if($this->transform === null)
			$this->transform = $translate_str;
		else 
			$this->transform .= $translate_str;
	}
	
	public function scale($xe, $ye){
		if(! is_int($xe) || ! is_int($ye)) return;
		
		$scale_str = sprintf("transform:scale(%dpx, %dpx);",$xe, $ye);
		$scale_str .= sprintf("-ms-transform:scale(%dpx, %dpx);",$xe, $ye);
		$scale_str .= sprintf("-moz-transform:scale(%dpx, %dpx);",$xe, $ye);
		$scale_str .= sprintf("-webkit-transform:scale(%dpx, %dpx);",$xe, $ye);
		
		if($this->transform === null)
			$this->transform = $scale_str;
		else 
			$this->transform .= $scale_str;
	}
	
	public function skew($xdeg, $ydeg){
		if(! is_int($xdeg) || ! is_int($ydeg)) return;
		
		$skew_str = sprintf("transform:skew(%ddeg, %ddeg);",$xdeg, $ydeg);
		$skew_str .= sprintf("-ms-transform:skew(%ddeg, %ddeg);",$xdeg, $ydeg);
		$skew_str .= sprintf("-moz-transform:skew(%ddeg, %ddeg);",$xdeg, $ydeg);
		$skew_str .= sprintf("-webkit-transform:skew(%ddeg, %ddeg);",$xdeg, $ydeg);
		
		if($this->transform === null)
			$this->transform = $skew_str;
		else 
			$this->transform .= $skew_str;
	}
	
	public function setTransition($attribute, $time_intval){
		if(! is_string($attribute) || ! is_int($time_intval))	return;
		
		if($this->transition === null){
			$this->transition = array();
			$this->transition[$attribute] = $time_intval;
		}
		else{
			$this->transition[$attribute] = $time_intval;
		} 
	}
	
	public function formatStyle($more){
		$ret = "";
		
		if($this->position !== null)
			$ret .= 'position:' . $this->position . ";";
		else 
			$ret .= "position:absolute;";
		
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
		
		if($this->float !== null)
			$ret .= sprintf("float:%s;", $this->float);
		
		if($this->transform !== null){
			$ret .= sprintf("%s", $this->transform);
		}
		
		if($this->transition !== null){
			$keys = array_keys($this->transition);
			$len = count($this->transition);
			
			$common_str = "transition:";
			$moz_str = "-moz-transition:";
			$webkit_str = "-webkit-transition:";

			$i = 0;
			foreach ($keys as $k){
				$val = $this->transition[$k];
				
				if($k === "transform"){
					$common_str .= sprintf("%s %ds", $k, $val);
					$moz_str .= sprintf("-moz-%s %ds", $k, $val);
					$webkit_str .= sprintf("-webkit-%s %ds", $k, $val);
				}
				else{
					$common_str .= sprintf("%s %ds", $k, $val);
					$moz_str .= sprintf("%s %ds", $k, $val);
					$webkit_str .= sprintf("%s %ds", $k, $val);
				}
				
				if($i + 1 < $len){
					$common_str .= ",";
					$moz_str .= ",";
					$webkit_str .= ",";
				}
				else{
					$common_str .= ";";
					$moz_str .= ";";
					$webkit_str .= ";";
				}
				
				$i ++;
			}// foreach
			
			$ret .= $common_str . $moz_str . $webkit_str;
		}
		
		if(is_int($this->columnCount)){
			$ret .= sprintf("column-count:%d;", $this->columnCount);
			$ret .= sprintf("-moz-column-count:%d;", $this->columnCount);
			$ret .= sprintf("-webkit-column-count:%d;", $this->columnCount);
		}
		if(is_int($this->columnGap)){
			$ret .= sprintf("column-gap:%dpx;", $this->columnGap);
			$ret .= sprintf("-moz-column-gap:%dpx;", $this->columnGap);
			$ret .= sprintf("-webkit-column-gap:%dpx;", $this->columnGap);
		}
		if(is_string($this->columnRule)){
			$ret .= sprintf("column-rule:%s;", $this->columnRule);
			$ret .= sprintf("-moz-column-rule:%s;", $this->columnRule);
			$ret .= sprintf("-webkit-column-rule:%s;", $this->columnRule);
		}
		
		if($this->resize === true){
			$ret .= sprintf("resize:both;");
		}
		
		if($more !== null)
			$ret .= $more ;
		
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
		
		$ret .= $this->indentDepth($depth);
		
		$ret .= sprintf("<div id=\"%s\" class=\"%s\" ", $this->id, $this->class);

		$ret .= sprintf("style=\"%s\" ",$this->formatStyle(null));
		
		$ret .= $this->formatJsListeners();
		
		$ret .= ">\n";
		echo $ret;
		
		$ret .= $this->formatJsCode($depth);
				
		$this->renderChildren($depth + 1);
		
		$ret = "";
		$ret .= $this->indentDepth($depth);
		$ret .="</div>\n";
		echo $ret;
	}
	
}