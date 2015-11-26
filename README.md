# phpgui
       This a html widgets wrapper library writing in php , for making more "pure" in dynamic web pages development . I like cleaning 
declarement like XAML, but that html declarement  is too dirty and redundant. I think PHP code itself is exactly a good declarement  and
can do what jQuery has done. It's in developing heavily....

==================================================================
I want it to work like this:
---------------------------------
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


$page->addChild($w);
$w->addChild($c);
$c->addChild($a);
$c->addChild($b);

$page->renderPage();
------------------------------------

====================================================================================
this is the generated html:
------------------------------------
<html>
<head>
<meta charset="utf-8">
	<title>MyPage</title>
</head>
<body sytle="font-family:'times sans-serif'">
<div id="MyPage" class="" style="position:absolute;top:0px;left:0px;width:100%;height:100%;" >
    <div id="MyCom" class="" style="position:absolute;background-color:#ff0000;top:100px;left:100px;width:200px;height:300px;" >
        <div id="com2" class="" style="position:absolute;background-color:#0000ff;border:3px solid #808080;top:150px;left:150px;width:200px;height:300px;" >
            <a id="" class="" style="position:absolute;top:0px;left:300px;width:100px;height:10px;font-size:23;" >hello world!
            </a>
            <div id="" class="" style="position:absolute;background-color:#909090;border:3px solid #808080;border-style:outset;top:0px;left:400px;width:50px;height:30px;" >
            </div>
        </div>
    </div>
</div>
</body>
</html>
-------------------------------------

