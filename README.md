    
This a html widgets wrapper library writing in php , for making more "pure" in dynamic web pages development . I like clean declaration like XAML, but the html declaration  is too dirty and redundant. I think PHP code itself is exactly a good declarement  and can do what jQuery has done. It's in developing heavily....<br/>
<br/><br/>
it work like this:<br/>
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br/>
require_once 'phpgui.php';<br/>
<br/>
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
$b->bindFormAction("myform", "/a/b/c?");<br/>
<br/>
<br/>
$page->addChild($w);<br/>
$w->addChild($c);<br/>
$c->addChild($a);<br/>
$c->addChild($b);<br/>
<br/>
<br/>
$form = new Form("post", "Myform", "/TestGui.php");<br/>
$form->x = 200;<br/>
$form->y = 10;<br/>
$form->width = 200;<br/>
$form->height = 50;<br/>
<br/>
$input_text = new TextField();<br/>
$input_text->name = "text1";<br/>
$input_text->width = 200;<br/>
$input_text->height = 20;<br/>
$input_text->border->width = 1;<br/>
$input_text->border->color = "#00ff00";<br/>
<br/>
$input_checkbox = new CheckBox();<br/>
$input_checkbox->name = "checkbox1";<br/>
$input_checkbox->x = 100;<br/>
<br/>
$input_checkbox_label = new Label();<br/>
$input_checkbox_label->text = "hello";<br/>
$input_checkbox_label->x = 115;<br/>
<br/>
<br/>
$but = new Button();<br/>
$but->name = "AllOk";<br/>
$but->value = "That Ok";<br/>
$but->width = 70;<br/>
$but->y = 10;<br/>
<br/>
$form->addChild($input_text);<br/>
$form->addChild($input_checkbox);<br/>
$form->addChild($input_checkbox_label);<br/>
$form->addChild($but);<br/>
<br/>
$page->addChild($form);<br/>
<br/>
$img = new Image();<br/>
$img->src = "/phpgui/img/test.jpg";<br/>
$img->x = 800;<br/>
$img->y = 200;<br/>
$img->width = 300;<br/>
$img->height = 200;<br/>
<br/>
$page->addChild($img);<br/>
<br/>
<br/>
$page->renderPage();<br/>

++++++++++++++++++++++++++++++++++++++<br/>
This is snapshot :<br/>
<img src="https://github.com/yytony/phpgui/blob/master/img/snapshot1.png"/>


