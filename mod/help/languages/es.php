<?php
/**
 * Help language file
 */

$language = array(
	// titles
	'help:admin' => '?',
	'help:categories' => 'Categorías de Ayuda',

	// menu items and instructions
	'help:admin:instruct' => "Crear y editar FAQs categorizadas.",
	'help:back' => "Volver a categorías de ayuda",
	'help:topics' => "Temas de Ayuda",

	// category titles
	'help:title:getting_started' => 'Empezando en ECT',
	'help:title:blogging' => 'Blogs',
	'help:title:bookmarks' => 'Favoritos',
	'help:title:thewire' => 'Mensajes Cortos',
	'help:title:profile' => 'Tu perfil y configuración',
	'help:title:settings' => 'Herramientas Colaborativas',

	// category blurbs
	'help:blurb:getting_started' => 'Información, Cuentas y Privacidad',
	'help:blurb:blogging' => 'Escribe, guarda y previsualiza',
	'help:blurb:bookmarks' => 'Bookmarklet, Compartiendo Favoritos',
	'help:blurb:thewire' => 'Mensajes cortos, menciones, etiquetas',
	'help:blurb:profile' => 'Avatar, Campos del perfil, settings',
	'help:blurb:settings' => 'Video-Reuniones, Documentos online',

	// form
	'help:label:category' => 'Categoría',
	'help:label:question' => 'Pregunta',
	'help:label:answer' => 'Respuesta',

	// status messages
	'help:status:deletequestion' => 'El tema de ayuda ha sido borrado.',
	'help:error:nodelete' => 'No se pudo eliminar el tema de ayuda.',
	'help:status:save' => 'El tema de ayuda se guardó con éxito.',
	'help:error:nosave' => 'no se pudo guardar el tema de ayuda',

	// Elgg's generic name for this object type
	'item:object:help' => 'Tema de ayuda',
);

add_translation("es", $language);
