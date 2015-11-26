<?php

$phpgui_dir = __DIR__;

$entry_script_file =  $_SERVER['PHP_SELF'];
$entry_script_server_path = dirname($entry_script_file);

$hostDomain = $_SERVER['SERVER_NAME'];
if(is_string($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] !== '80')
	$hostDomain .= ":" . $_SERVER['SERVER_PORT'];

echo "$hostDomain";
//echo "$entry_script_file<br/>";
//echo "$entry_script_server_path<br/>";

require_once 'Widget.php';
require_once 'Page.php';
require_once 'Lable.php';
require_once 'Button.php';
