<?php

if(!defined('_LOGGER_PHP_')) {  
    define('_LOGGER_PHP_', '1');  
 
if(!defined('LOG_ROOT')) {  
    define('LOG_ROOT', './');  
}  
  
define('LEVEL_FATAL', 0);  
define('LEVEL_ERROR', 1);  
define('LEVEL_WARN', 2);  
define('LEVEL_INFO', 3);  
define('LEVEL_DEBUG', 4);  
  
  
class Logger {  
    static $LOG_LEVEL_NAMES = array(  
        'FATAL', 'ERROR', 'WARN', 'INFO', 'DEBUG'  
    );  
  
    private $level = LEVEL_INFO;
    //yy  
    private static $logger = null;
  	private $fileName = "phpgui";
  	
    static function getInstance() {
    	if(Logger::$logger == null){  
        	return Logger::$logger = new Logger;  
    	}
    	return Logger::$logger;
    }  
    
    // yy
    function setLogFileName($fn){
    	$this->fileName = $fn;
    }
  
    function setLogLevel($lvl) {  
        if($lvl >= count(Logger::$LOG_LEVEL_NAMES)  || $lvl < 0) {  
            throw new Exception('invalid log level:' . $lvl);  
        }  
        $this->level = $lvl;  
    }  
  
    function _log($level, $message, $name) {  
        if($level > $this->level) {  
            return;  
        }  
      
        if(is_set($name)) $fileName = $name;
        
        $log_file_path = LOG_ROOT . $this->fileName . '.log';  
        $log_level_name = Logger::$LOG_LEVEL_NAMES[$this->level];  
        $content = date('Y-m-d H:i:s') . ' [' . $log_level_name . '] ' . $message . "\n";  
        file_put_contents($log_file_path, $content, FILE_APPEND);  
    }  
  
  
    function debug($message, $name = 'root') {  
        $this->_log(LEVEL_DEBUG, $message, $name);  
    }  
    function info($message, $name = 'root') {  
        $this->_log(LEVEL_INFO, $message, $name);  
    }  
    function warn($message, $name = 'root') {  
        $this->_log(LEVEL_WARN, $message, $name);  
    }  
    function error($message, $name = 'root') {  
        $this->_log(LEVEL_ERROR, $message, $name);  
    }  
    function fatal($message, $name = 'root') {  
        $this->_log(LEVEL_FATAL, $message, $name);  
    }  
} 
} // if(!defined('_LOGGER_PHP_')) 