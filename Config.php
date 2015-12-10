<?php

$AppName = null;

//echo "88888888888";
//////////////////////////////////////////////////////////////////////////////////////

$entry_script_file =  $_SERVER['PHP_SELF'];
$entry_server_path = dirname($entry_script_file);

$hostDomain = $_SERVER['SERVER_NAME'];
if(is_string($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] !== '80')
	$hostDomain .= ":" . $_SERVER['SERVER_PORT'];

/*
echo "host domain: $hostDomain<br/>";
echo "entry script: $entry_script_file<br/>";
echo "entry server path: $entry_server_path<br/>";

echo "-------------------<br/>";
*/
$phpgui_config_abs_file_path = __FILE__;
$PHPgui_config_abs_dir = __DIR__;
/*
echo "config file: $phpgui_config_abs_file_path<br/>";
echo "config dir: $PHPgui_config_abs_dir<br/>";
*/

//echo "entry server path: $entry_server_path<br/>";
//echo "config dir: $PHPgui_config_abs_dir<br/>";



$entry_server_path_array = split("[\\/]", $entry_server_path);
$config_abs_dir_array = split("[\\/]", $PHPgui_config_abs_dir);

//print_r($entry_server_path_array);
//echo "-----------------------------------------------<br/>";
//print_r($config_abs_dir_array);
//echo "-----------------------------------------------<br/>";

$len_server_path = count($entry_server_path_array);
$len_config_dir = count($config_abs_dir_array);

if($AppName === null){

	$hasFound = false;
	$ret = "";
	for($i = 0; $i < $len_server_path; $i ++){
		for($j = $len_config_dir - 1; $j >=0; $j --){
			if($entry_server_path_array[$i] === $config_abs_dir_array[$j]){
				$hasFound = true;
				$ret = $entry_server_path_array[$i];
				break;
			}
		}
		
	}
	
	if($hasFound === true)
		$AppName = $ret;
}

$PHPGUI_ROOT = "/";
for($i = 0; $i < $len_config_dir; $i ++ ){
	$hasFoundAppName = false;
	$hasFoundPHPGUI = false;
	$t =  $config_abs_dir_array[$i];
	if($t === $AppName)
		$hasFoundAppName = true;
	
	if($t === "phpgui")
		$hasFoundPHPGUI = true;

	if($hasFoundAppName && $t !== "phpgui")
		$PHPGUI_ROOT .= $t . "/";
	
	if($hasFoundPHPGUI){
		$PHPGUI_ROOT .= "phpgui";
		break;
	}
	
}

//echo "phpgui_root: $PHPGUI_ROOT<br/>";
//echo "app name: $AppName<br/>";
 