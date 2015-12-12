<?php

require_once __DIR__ . '/../phpgui.php';


$page = new Page();

$table = new Table(
	new TableRow(
			new TableDataCell(new Label("hello")),
			new TableDataCell(new Label("world"))
	),
	new TableRow(
			new TableDataCell(new Label("aaa")),
			new TableDataCell(new Label("bbb"))
	)
		
);


$page->addChild($table);

$page->renderPage();

