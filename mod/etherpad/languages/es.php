<?php
/**
 * Etherpads archivo de idioma Español
 */

$spanish = array(

	/**
	 * Menu items and titles
	 * Sería mejor cambiar Etherpads por Documentos Colaborativos o algo asi
	 */
	'etherpad' => "Textos Colaborativos",
	'etherpad:add' => "Nuevo texto colaborativo",
	'etherpad:edit' => "Editar texto colaborativo",
	'etherpad:owner' => "Textos colaborativos de %s",
	'etherpad:friends' => "textos colaborativos de Amigos",
	'etherpad:everyone' => "Todos los textos colaborativos",
	'etherpad:new' => "Un nuevo texto colaborativo",
	'etherpad:via' => "v&iacute;a textos colaborativos",
	'etherpad:address' => "Direcci&oacute;n de texto colaborativo",
	'etherpad:none' => 'No hay textos',
	'etherpad:write' => 'Agregar texto colaborativo',
	'etherpad:delete:confirm' => "&iquest;Est&aacute; seguro de eliminar este recurso?",
	'etherpad:fullscreen' => 'Pantalla completa',
	'etherpad:numbertodisplay' => 'N&uacute;mero de textos colaborativos a mostrar',

	'etherpad:visit' => "Visitar este recurso",
	'etherpad:recent' => "Textos colaborativos recientes",
	'etherpad:access:message' => "Por el momento todos los textos colaborativos son p&uacute;blicos. Proximante se podr&aacute; cambiar esto",
	'etherpad:access_id' => "Acceso de Lectura",
	'etherpad:write_access_id' => "Acceso de escritura",
	'river:create:object:etherpad' => '%s ha creado un nuevo etherpad llamado %s',
	'river:comment:object:etherpad' => '%s comento el etherpad llamado %s',
	'etherpad:river:annotate' => 'un comentario en este etherpad',

	'item:object:etherpad' => 'Textos colaborativos',

	'etherpad:group' => 'Textos colaborativos del Grupo',
	'etherpad:enabletherpads' => 'Activar textos colaborativos del grupo',
	'etherpad:nogroup' => 'Este grupo no tiene textos colaborativos a&uacute;n',
	'etherpad:more' => 'M&aacute;s textos colaborativos',

	'etherpad:no_title' => 'Sin t&iacute;tulo',

	/**
	 * Status messages
	 */

	'etherpad:save:success' => "El texto colaborativo se guardo correctamente.",
	'etherpad:delete:success' => "El texto colaborativo se elimin&oacute; correctamente.",

	/**
	 * Error messages
	 */

	'etherpad:save:failed' => "El texto colaborativo no se pudo guardar, aseg&uacute;rese que ha introducido el t&iacute;tulo y vuelva a intentarlo",
	'etherpad:delete:failed' => "Su texto colaborativo no se pudo guardar, int&eacute;ntelo nuevamente.",
	
	/**
	 * Edit page
	 */
	 
	 'etherpad:edit:title' => "título",
	 'etherpad:edit:desc' => "descripción",
	 'etherpad:edit:tags' => "etiquetas",

	/**
	 * Admin settings
	 */

	'etherpad:etherpadhost' => "Direcci&oacute;n del Host de Etherpad Lite",
	'etherpad:etherpadkey' => "Etherpad lite api key:",
	'etherpad:showchat' => "&iquest;Mostrar Chat?",
	'etherpad:linenumbers' => "&iquest;Mostrar n&uacute;mero de l&iacute;neas?",
	'etherpad:showcontrols' => "&iquest;Mostrar controles?",
	'etherpad:monospace' => "&iquest;Usar fuentes mono espacio?",
	'etherpad:showcomments' => "&iquest;Mostrar comentarios?",
	'etherpad:newpadtext' => "Texo de bienvenida a mostrar dentro de los etherpad nuevos:",
	'etherpad:pad:message' => 'El nuevo etherpad se ha creado correctamente.',
	
	/**
	 * Widget
	 */
	'etherpad:profile:numbertodisplay' => "N&uacute;mero de pads a mostrar",
        'etherpad:profile:widgetdesc' => "Mostrar sus &uacute;ltimos pads",
);

add_translation('es', $spanish);
