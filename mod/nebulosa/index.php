<?php

if (elgg_is_logged_in())
	forward('activity');
////////////////////////////////////////////////////////////////////////////////////////////////
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://ect.int.i-administracion.junta-andalucia.es/piwik/" : "http://ect.int.i-administracion.junta-andalucia.es/piwik/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 2);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://ect.int.i-administracion.junta-andalucia.es/piwik/piwik.php?idsite=2" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->
<title>Red Profesional de ECT</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="mod/nebulosa/css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="mod/nebulosa/css/jquery.jcarousel.css" type="text/css" media="all" />
<link rel="stylesheet" href="mod/nebulosa/css/skin.css" type="text/css" media="all" />
<!--[if IE 6]>
<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
<![endif]-->
<link rel="shortcut icon" type="image/x-icon" href="mod/nebulosa/css/images/favicon.ico" />
<script src="mod/nebulosa/js/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
<script src="mod/nebulosa/js/jquery.jcarousel.js" type="text/javascript" charset="utf-8"></script>
<script src="mod/nebulosa/js/png-fix.js" type="text/javascript" charset="utf-8"></script>
<script src="mod/nebulosa/js/fn.js" type="text/javascript" charset="utf-8"></script>
<title>LIGHTBOX EXAMPLE</title>
<style>
input[type="submit"] {
font: 100% Arial, Helvetica, sans-serif;
font-weight: bold;
color: #ffffff;
border: 1px solid #98CF00;
-webkit-border-radius: 5px; 
-moz-border-radius: 5px;
width: 120px;
height: 31px;
background:#98CF00 url(mod/inchiridium/css/buttonindex.png) repeat-x 0 0;
vertical-align:top;
}
.black_overlay{
display: none;
position: absolute;
top: 0%;
left: 0%;
width: 100%;
height: 100%;
background-color: black;
z-index:1001;
-moz-opacity: 0.8;
opacity:.60;
filter: alpha(opacity=80);
}
.white_content {
display: none;
position: absolute;
top: 25%;
left: 32%;
width: 30%;
height: 28%;
padding: 16px;
border: 16px solid black;
background-color: black;
z-index:1002;
overflow: auto;
}
.register_content {
display: none;
position: absolute;
top: 25%;
left: 32%;
width: 30%;
height: 60%;/*:DC:*/
padding: 16px;
border: 16px solid black;
background-color: black;
z-index:1002;
overflow: auto;
body: white;
}
</style>
</head>

<body>

<?php 

include("mod/nebulosa/D_Engine.php"); 

?>


<div id="header">
<div class="shell">
<h1 id=logo>
<a href="http://ect.int.i-administracion.junta-andalucia.es" title="ECT">
<span>ECT
</a>
</h1>
<div id="nav">
<ul>
<li><a href="http://ect.int.i-administracion.junta-andalucia.es/saml_login?saml_login=true" class="active"><strong>Login SSO<span>Single Sign On JDA</span></strong></a></li>
<li><a href="javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"><strong>Login<span>Entra en ECT</span></strong></a><div id="light" class="white_content">
<?php
$form_body = 
"
<p>
<label>"
.elgg_echo('username')
."<br />"
.elgg_view
(
'input/text'
,array
(
'name' => 'username'
,'class' => 'login-textarea'
)
)
."</label><br />
";
$form_body .=
"<label>"
.elgg_echo('password')
."<br />" 
.elgg_view
(
'input/password'
,array
(
'name' => 'password'
,'class' => 'login-textarea'
)
)
."</label><br /><br />
";
$form_body .=
elgg_view
(
 'input/submit'
,array
(
'value' => elgg_echo('login')
)
)
."</p>
";
echo elgg_view
(
'input/form'
,array
(
 'body' => $form_body
,'action' => ""
.$vars['url']
."action/login"
)
);
?>
<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Cerrar</a></div>
<!-- div id="welcome-box" -->
<div id="fade" class="black_overlay"></div></li>
<li>
<a href="javascript:void(0)" onclick = "document.getElementById('register').style.display='block';document.getElementById('fade').style.display='block'">
<strong>
Registrate
<span>
Abre tu cuenta en ECT
</span>
</strong>
</a>
<div id="register" class="register_content">
<center>
<?php
////////////////////////////////////////////////////////////////
$form_body  = "<p><label>................<br>" . elgg_echo('name') . "<br />" . elgg_view('input/text' , array('name' => 'name', 'class' => "general-textarea", 'value' => $name)) . "</label><br />";
$form_body .= "<label>" . elgg_echo('email') . "<br />" . elgg_view('input/text' , array('name' => 'email', 'class' => "general-textarea", 'value' => $email)) . "</label><br />";
$form_body .= "<label>" . elgg_echo('username') . "<br />" . elgg_view('input/text' , array('name' => 'username', 'class' => "general-textarea", 'value' => $username)) . "</label><br />";
$form_body .= "<label>" . elgg_echo('password') . "<br />" . elgg_view('input/password' , array('name' => 'password', 'class' => "general-textarea")) . "</label><br />";
$form_body .= "<label>" . elgg_echo('passwordagain') . "<br />" . elgg_view('input/password' , array('name' => 'password2', 'class' => "general-textarea")) . "</label><br /><br />";
$form_body .= elgg_view('register/extend');
$form_body .= elgg_view('input/captcha');
if ($admin_option) {
$form_body .= elgg_view('input/checkboxes', array('name' => "admin", 'options' => array(elgg_echo('admin_option'))));
}
$form_body .= elgg_view('input/hidden', array('name' => 'friend_guid', 'value' => $vars['friend_guid']));
$form_body .= elgg_view('input/hidden', array('name' => 'invitecode', 'value' => $vars['invitecode']));
$form_body .= elgg_view('input/hidden', array('name' => 'action', 'value' => 'register'));
$form_body .= elgg_view('input/submit', array('name' => 'submit', 'value' => elgg_echo('register'))) . "</p>";
?>
<h2>
<?php
//echo elgg_echo('register');
?>
</h2>
<?php
////////////////////////////////////////////////////////////////
echo elgg_view
(
'input/form'
,array
(
'body' => $form_body
,'action' => "{$vars['url']}action/register"
)
);
?>
<a href = "javascript:void(0)" onclick = "document.getElementById('register').style.display='none';document.getElementById('fade').style.display='none'">Close</a></div>
<div id="fade" class="black_overlay"></div>
</center>
</br>
</li>
<li><a href="#"><strong>Terminos<span>Lee los terminos y condiciones</span></strong></a></li>
<li><a href="#"><strong>Privacidad<span>Aprende mas</span></strong></a></li>
</ul>
</div>
</div>
</div>
<div class="slide-area">
<div class="shell">
<div class="slider">
<ul id="mycarousel" class="jcarousel-skin-tango">
<li>
<div class="image">
<img src="mod/nebulosa/css/images/mini_ect.png" alt="" />
</div>
<div class="info">
<h2>¿Que es la Red Profesional de ECT?</h2>
<p><a href="http://es.wikipedia.org/wiki/Trabajo_colaborativo">ECT significa Entorno Colaborativo de Trabajo</a>, La Red Profesional es una herramienta de trabajo colaborativo cuyo fin es que trabajemos más cómodamente, rentabilicemos nuestros esfuerzos, le demos visibilidad a nuestro conocimiento y nos ayudemos a conseguir nuestros objetivos</p>
	<p>Esta herramienta se basa en el concepto de "SocialMedia", de manera que es importante que sigamos a los contactos de nuestro interés y nos unamos a los grupos que nos parezcan interesantes con el fin de obtener la visibilidad deseada. Puedes aprender mucho de los contenidos publicados en la herramienta y publicar los tuyos propios!</p>
</div>
</li>

<li>
<div class="image">
<img src="mod/nebulosa/css/images/iphone.png" alt="" />
</div>
<div class="info">
<h2>ECT en el móvil</h2>
<p><a href="#">Usa ECT desde tu Smartphone</a>, La Interfaz móvil está preparada para usar toda la red profesional desde tu móvil de nueva generación. Visualmente se han cambiado los menús y controles para que los tengas al alcance de tu dedo.</p>
<p>Ya no pierdes ocasión para participar con tus compañeros y en los grupos de interés de la red Profesional. Si quieres usar las reuniones online desde tu smartphone, puedes usar la aplicación disponible para android. </p>
</div>
</li>
<li>
<div class="image">
<img src="mod/nebulosa/css/images/webcam_logo_peq.png" alt="" />
</div>
<div class="info">
<h2>Reuniones On-Line y Edición Colaborativa</h2>
<p><a href="webinar/all">Reuniones y documentos on-line a través de ECT</a>, ¿No puedes asistir presencialmente a una reunión? Usa las reuniones on-line (video-conferencia) del Entorno Colaborativo de Trabajo a través de la Red Profesional, sólo debes crear o unirte a una reunión online y usar tus auriculares, micrófono y  webcam</p>
<p>Los textos online permiten crear y editar un documento en tiempo real por varios usuarios al mismo tiempo, por ejemplo para usarlo como acta de reuniones, borrador de un documento o lluvia de ideas; es una gran ayuda, tanto para reuniones virtuales como presenciales.</p>
</div>
</li>
<li>
<div class="image">
<img src="mod/nebulosa/css/images/redes_peq.png" alt="" />
</div>
<div class="info">
<h2>Grupos</h2>
<p><a href="groups/all?filter=alpha">Participa en grupos de interés</a>, Para trabajar colaborativamente los usuarios se reúnen en grupos de interés, lo que les permite tener una privacidad sobre la visibilidad y edición de sus contenidos. </p>
<p>Pude haber uno o varios administradores de un grupo y además los grupos pueden ser abiertos o cerrados, lo que limita el acceso a los contenidos generados por el grupo. Los grupos abiertos pueden publicar al exterior, pero pueden contener sub-grupos cerrados donde se trabaja en privado. </p>
</div>
</li>
<li>
<div class="image">
<img src="mod/nebulosa/css/images/mini_ect.png" alt="" />
</div>
<div class="info">
<h2>Cuenta tu experiencia personal</h2>
<p><a href="blog">Haz saber a los demás tu experiencia</a>, Además de los grupos puedes intervenir a título personal. Compartir tu experiencia en la Red Profesional de ECT es muy sencillo, tienes herramientas personales como los mensajes cortos (microblogging) o las entradas en tu blog personal para compartir qué estas haciendo ahora o qué te ha parecido algo interesante que has visto.</p>
<p>Si necesitas otras opciones puedes usar las encuestas, las paǵinas (wiki), los ficheros, favoritos, etc., un abanico de posibilidades para hacer las cosas más fáciles.</p>
</div>
</li>
</ul>
</div>
</div>
</div>
<div id="content">
<div class="shell">
<div class="triple">
<ul>
<li>
<h3>Proyecto totalmente Software Libre</h3>
<ul>
Todas las aplicaciones que componen el Entorno Colaborativo de Trabajo son software libre, también llamado de fuentes abiertas. Usamos Elgg como motor de red social, BigBlueButton para las reuniones online, Etherpad Lite para los documentos colaborativos y LDAP para la autenticación.
</ul>
</li>
<li>
<h3>Trabaja con privacidad</h3>
<ul>
¿Te preocupa quien puede ver tus datos y documentos? Tu controlas la visibilidad de lo que escribes o subes. Podrás hacer lo mismo que en conocidas plataformas de Internet, pero controlando quién accede a tus datos y cual es el grado de privacidad de tus contenidos. 
</ul>
</li>
<li class="last">
<h3>Usa el conocimiento</h3>
<ul>
Todos poseemos conocimientos que pueden resultar valiosos para otros, pero en muchos casos ignoramos quien sabe de qué, o las piezas que necesitamos están inconexas y dispersas en la organización. Esta herramienta puede establecer vías de comunicación adicionales a la estructura de la organización, que permitan detectar y organizar el conocimiento, para realizar un trabajo más rápido, cómodo y eficiente. 
</ul>
</li>
<div class="cl">&nbsp;</div>
</div>
</div>
</div>
<div id="footer">
<div class="shell">
</div>
<p class="ftr-nav"><a href='#'>Acerca</a> | 
<a href="#">Terminos</a> 
| <a href="#">Privacidad</a> | 
</a></p>
<p class="copy">
Copyright 2012 | ECT. Diseñado por 
<a href="http://www.juntadeandalucia.es">Junta de Andalucía</a>
</p>
</div>
</div>
</body>
</html>
