    
This a html widgets wrapper library writing in php , for making more "pure" in dynamic web pages development . I like clean declaration like XAML, but the html declaration  is too dirty and redundant. I think PHP code itself is exactly a good declarement  and can do what jQuery has done. It's in developing heavily....<br/>
<br/><br/>
it work like this:<br/>
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br/>
require_once 'phpgui.php';<br/>
<br/>
$page = new Page();<br/>
$page->id = "MyPage";<br/>
<br/>
$w = new Widget();<br/>
$w->id = "MyCom";<br/>
$w->background->color = "#ff0000";<br/>
$w->x = 100;<br/>
$w->y = 100;<br/>
$w->width = 200;<br/>
$w->height = 300;<br/>
<br/>

$c = new Widget();<br/>
$c->id = "com2";<br/>
$c->background->color = "#0000ff";<br/>
$c->x = 150;<br/>
$c->y = 150;<br/>
$c->width = 200;<br/>
$c->height = 300;<br/>
$c->border->outSet = 1;<br/>
$c->border->width = '3px';<br/>
$c->border->color = '#808080';<br/>
<br/>
$a = new Label();<br/>
$a->text = "hello world!";<br/>
$a->width = 100;<br/>
$a->height = 10;<br/>
$a->x = 300;<br/>
$a->font->size = 23;<br/>
<br/>
$b = new Button();<br/>
$b->x = 400;<br/>
<br/>

$page->addChild($w);<br/>
$w->addChild($c);<br/>
$c->addChild($a);<br/>
$c->addChild($b);<br/>
<br/>
$page->renderPage();<br/>
