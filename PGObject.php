<?php


class PGObject {
	public $parent = null;
	protected  $children = null;
	
	public function __construct(){
		
	}
	
	public function  getChildren() {return $this->children;}
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
					echo "set: $key = $val<br/>";
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
}

