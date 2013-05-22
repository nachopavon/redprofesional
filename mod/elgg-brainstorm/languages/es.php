<?php
/**
 * Brainstorm English language file
 */

$spanish = array(

	/**
	 * Menu items and titles
	 */
	
	'brainstorm:filter:top' => "Top",
	'brainstorm:filter:hot' => "Hot",
	'brainstorm:filter:new' => "Nuevas",
	'brainstorm:filter:accepted' => "Aceptadas",
	'brainstorm:filter:completed' => "Completadas",
	
	'item:object:idea' => 'Idea',
	'river:create:object:idea' => '%s ha enviado la idea %s',
	'river:comment:object:idea' => '%s ha comentado sobre una idea %s',
	'river:edit:object:idea' => '%s ha editado la idea %s',
	'brainstorm:river:annotate' => 'a comentado sobre esta idea',
	'brainstorm:river:item' => 'un item',
	
	'brainstorm' => "Brainstorm",
	'brainstorm:add' => "Agregar idea",
	'brainstorm:edit' => "Editar idea",
	'brainstorm:new' => "Nueva idea",
	'brainstorm:settings' => "Settings",
	
	'brainstorm:all' => "Todas las ideas",
	'brainstorm:owner' => "Ideas de %s",
	'brainstorm:friends' => "Ideas de amigos",
	'brainstorm:idea:edit' => "Editar esta idea",
	'brainstorm:idea:add' => "Agregar una idea",
	
	'brainstorm:group:settings:title' => "Configuración del brainstorm de %s",
	'brainstorm:group_settings' => "Configuración",
	'brainstorm:enablebrainstorm' => "Habilitar brainstorm",
	'brainstorm:group' => 'Brainstorm de grupo',
	'brainstorm:same_group' => "En el mismo grupo:",
	'brainstorm:view:all' => "Ver todos",
	
	/**
	 * Content
	 */
	'brainstorm:yourvotes' => "Tus votos:",
	'brainstorm:vote' => "Vota:",
	'brainstorm:status' => "Estado:",
	'brainstorm:state' => "Estado:",
	'brainstorm:status_info' => "Información acerca del estado:",
	'brainstorm:open' => 'Abierto',
	'brainstorm:under review' => 'En revisión',
	'brainstorm:planned' => 'Planificado',
	'brainstorm:started' => 'Iniciado',
	'brainstorm:completed' => 'Completado',
	'brainstorm:declined' => 'Declinado',
	
	'brainstorm:none' => "Ninguna idea.",
	'brainstorm:novoteleft' => "voto restante.",
	'brainstorm:onevoteleft' => "voto restante.",
	'brainstorm:votesleft' => "votos restantes.",
	
	'brainstorm:search' => "Buscar o enviar una idea:",
	'brainstorm:charleft' => "caracteres restantes.",
	
	'brainstorm:search:result_vote_submit' => "Ideas encontradas. Vota o ",
	'brainstorm:search:result_novote_submit' => "Idea encontrada. Cambia tu voto o",
	'brainstorm:search:result_novote_nosubmit' => "Ideas encontradas. No quedan puntos, cambia tus votos si quieres enviar una nueva idea.",
	'brainstorm:search:noresult_nosubmit' => "No se han encontrado ideas, buscar de nuevo. Debes cambiar tus votos si quieres enviar una nueva idea.",
	'brainstorm:search:noresult_submit' => "No se han encontrado ideas. Busca de nuevo o",
	'brainstorm:search:skip_words' => "para,pero,todo,cualquiera,poder,ella,nuestro,fuera,traer,tiene,como,hombre,nuevo,ahora,antiguo,forma,quien,hecho,dejar,poner,decir,ella,también,usar", // write words you want to skip separate by coma. Automaticaly skip word less than 3 chars, don't write them.

	'brainstorm:add' => "enviar una nueva idea",
	
	'brainstorm:settings:points' => "Número de puntos",
	'brainstorm:settings:question' => "Pregunta",
	'brainstorm:settings:brainstorm_submit_idea_without_point' => "Enviar idea sin punto",
	'brainstorm:settings:brainstorm_submit_idea_without_point_string' => "Comprueba si quieres ofrecer la posibilidad a los miembros del grupo el envío de ideas sin puntos. Ten cuidado con posibles avalanchas.",
	 
	/**
	 * Widget and bookmarklet
	 */
	'brainstorm:widget:title' => "Brainstorm",
	'brainstorm:widget:description' => "Mostrar ideas más puntuadas.",
	'brainstorm:more' => "Más ideas",
	'brainstorm:numbertodisplay' => "Número de ideas a mostrar",
	'brainstorm:typetodisplay' => "Ordenar por",

	/**
	 * Status messages
	 */
	'brainstorm:idea:rate:submitted' => "Idea calificada correctamente.",
	'brainstorm:idea:save:success' => "Tu idea se ha guardado correctamente.",
	'brainstorm:idea:delete:success' => "Tu idea se ha borrado correctamente.",
	'brainstorm:idea:delete:failed' => "Ha ocurrido un error al borrar la idea.",

	'brainstorm:idea:save:empty' => "Necesitas poner título y una descripción de la idea.",
	'brainstorm:idea:save:failed' => "Ha ocurrido un error al guardar la idea.",
	
	'brainstorm:group:settings:failed' => "No hay grupo o no tienes acceso a editar este grupo.",
	'brainstorm:group:settings:save:success' => "COnfiguración del brainstorm de grupo guardada correctamente.",

	/**
	 * Error messages
	 */
	'brainstorm:idea:rate:error:ajax' => "Error de conexión con el servidor.",
	'brainstorm:unknown_idea' => "Idea desconocida.",
	'brainstorm:idea:rate:error:value' => "Error en el valor para calificar esta idea.",
	'brainstorm:idea:rate:error' => "La idea no ha podido calificarse a causa de un error interno del servidor.",
	'brainstorm:idea:rate:error:underzero' => "Los votos que te quedan no te permiten calificar una idea.",
);

add_translation('es', $spanish);
