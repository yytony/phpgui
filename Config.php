<?php

$phpgui_dir = __DIR__;

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

