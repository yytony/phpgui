<?php

require_once '../Config.php';
require_once '../phpgui.php';


$page = new Page();

$table = new Table();

$tr1 = new TableRow();
$tr2 = new TableRow();

$tdc11 = new TableDataCell(new Label("hello"));
$tdc12 = new TableDataCell(new Label("what"));

$tr1->addChild($tdc11);
$tr1->addChild($tdc12);


$tdc21 = new TableDataCell(new Label("aaaaa"));
$tdc22 = new TableDataCell(new Label("bbbbb"));

$tr2->addChild($tdc21);
$tr2->addChild($tdc22);

$table->addChild($tr1);
$table->addChild($tr2);

$page->addChild($table);

$page->renderPage();

