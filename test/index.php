<?php 

require_once '../Config.php';
require_once '../phpgui.php';

//global $PHPGUI_ROOT;
$test_root = $PHPGUI_ROOT . "/test" ;

$test_abs_path = __DIR__;

$testFiles = `ls $test_abs_path`;

//print_r($testFiles);

echo "<br/><h2>TestCase Index </h2>";
echo "<div  style=\"border: 1px solid #00ff00; width:100%; height:1px;\" /><br/><br/>";

$test_files_array = split("[ \t\n]", $testFiles);
foreach ($test_files_array as $tf){
	echo sprintf("<a href=\"%s/%s\">$tf</a><br/>",$test_root, $tf);
}





