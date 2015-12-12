    
This a html widgets wrapper library writing in php , for making more "pure" in dynamic web pages development . I like clean declaration like XAML, but the html declaration  is too dirty and redundant. I think PHP code itself is exactly a good declarement  and can do what jQuery has done. This library is licensed under BSD LICENSE. It's now in developing heavily ....<br/>

<br/><br/>
it work like this:<br/>
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br/>
one syntax:<br/>
<br/>
<code>
$page = new Page();<br/>
$page->id = "myPage";

$page->addChildren(

			(new Widget(
					(new Widget())
					->set("id", "Mycom1.2")
					->set("x", 200)
					->set("y", 300)
					->set("width", 100)
					->set("height", 100)
					->setBackground("color", "#0000ff")
					)
			)->set("id", "Mycom1")
			->set("x", 100)
			->set("width", 300)
			->setBackground("color", "#ff0000")
			->set("height", 100),

			(new Widget()
			)->set("id", "Mycom2")
			->set("x", 700)
			->set("width", 100)
			->setBackground("color", "#00ff00")
			->set("height", 100)

).renderPage();


</code>
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br/>
Second Syntax:<br/>
<br/>
<br/>
<code>
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


$form = new Form("post", "Myform", "/TestGui.php");
$form->x = 200;
$form->y = 10;
$form->width = 200;
$form->height = 50;

$input_text = new TextField();
$input_text->name = "text1";
$input_text->width = 200;
$input_text->height = 20;
$input_text->border->width = 1;
$input_text->border->color = "#00ff00";

$input_checkbox = new CheckBox();
$input_checkbox->name = "checkbox1";
$input_checkbox->x = 100;

$input_checkbox_label = new Label();
$input_checkbox_label->text = "hello";
$input_checkbox_label->x = 115;


$but = new Button();
$but->name = "AllOk";
$but->value = "That Ok";
$but->width = 70;
$but->y = 10;

$form->addChild($input_text);
$form->addChild($input_checkbox);
$form->addChild($input_checkbox_label);
$form->addChild($but);

$page->addChild($form);

$img = new Image();
$img->src = "/phpgui/img/test.jpg";
$img->x = 800;
$img->y = 200;
$img->width = 300;
$img->height = 200;

$page->addChild($img);


$page->renderPage();

</code>
++++++++++++++++++++++++++++++++++++++<br/>
This is snapshot :<br/>
<img src="https://github.com/yytony/phpgui/blob/master/img/snapshot1.png"/>


