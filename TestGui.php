<?php

require_once 'phpgui.php';


$page = new Page();
$page->id = "MyPage";

$w = new Widget();
$w->id = "MyCom";
$w->background->color = "#ff0000";
$w->x = 100;
$w->y = 100;
$w->width = 200;
$w->height = 300;


$c = new Widget();
$c->id = "com2";
$c->background->color = "#0000ff";
$c->x = 150;
$c->y = 150;
$c->width = 200;
$c->height = 300;
$c->border->outSet = 1;
$c->border->width = '3px';
$c->border->color = '#808080';

$a = new Label();
$a->text = "hello world!";
$a->width = 100;
$a->height = 10;
$a->x = 300;
$a->font->size = 23;

$b = new Button();
$b->x = 400;
$b->bindFormAction("myform", "/a/b/c?");


$page->addChild($w);
$w->addChild($c);
$c->addChild($a);
$c->addChild($b);

$page->renderPage();

