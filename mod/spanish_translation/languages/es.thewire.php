<?php
if(elgg_is_active_plugin("thewire")){
    $language = array(
        /**
         * Menu items and titles
         */
        'thewire' => "Mensajes Cortos",
        'thewire:everyone' => "Todos los mensajes cortos",
        'thewire:user' => "Mensajes cortos de %s",
        'thewire:friends' => "Mensajes cortos de amigos",
        'thewire:reply' => "Responder",
        'thewire:replying' => "Responder a %s (@%s) quien escribe",
        'thewire:thread' => "Debate",
        'thewire:charleft' => "caracteres restantes",
        'thewire:tags' => "Mensajes cortos que coinciden con el tag '%s'",
        'thewire:noposts' => "No hay mensajes cortos a&uacute;n",
        'item:object:thewire' => "Mensajes Cortos",
        'thewire:update' => 'Actualizar',

        'thewire:previous' => "Anterior",
        'thewire:hide' => "Ocultar",
        'thewire:previous:help' => "Ver publicaci&oacute;n anterior",
        'thewire:hide:help' => "Ocultar publicaci&oacute;n anterior",

        /**
         * The wire river
         */
        'river:create:object:thewire' => "%s public&oacute; un nuevo %s",
        'thewire:wire' => 'mensaje corto',

        /**
         * Wire widget
         */
        'thewire:widget:desc' => 'Mostrar tus &uacute;ltimos mensajes cortos',
        'thewire:num' => 'Cantidad de comentarios a mostrar',
        'thewire:moreposts' => 'M&aacute;s mensajes cortos',
	'thewire:ask:status' => '¿En qué estas trabajando?',

        /**
         * Status messages
         */
        'thewire:posted' => "El mensaje corto se public&oacute; correctamente.",
        'thewire:deleted' => "El mensaje corto se elimin&oacute; correctamente.",
        'thewire:blank' => "Debe ingresar contenido para poder publicar.",
        'thewire:notfound' => "Lo sentimos, no se pudo encontrar la publicaci&oacute;n solicitada.",
        'thewire:notdeleted' => "Lo sentimos, no se pudo eliminar el mensaje corto.",

        /**
         * Notifications
         */
        'thewire:notify:subject' => "Nuevo mensaje corto",
        'thewire:notify:reply' => '%s respondi&oacute; a %s con un mensaje:',
        'thewire:notify:post' => '%s public&oacute; un nuevo mensaje:',
    );
    add_translation("es", $language);
}
