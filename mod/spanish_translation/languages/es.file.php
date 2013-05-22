<?php
if(elgg_is_active_plugin("file")){
    $language = array(
        /**
         * Menu items and titles
         */
        'file' => "Ficheros",
        'file:user' => "Ficheros de %s",
        'file:friends' => "Ficheros de amigos",
        'file:all' => "Todos los ficheros",
        'file:edit' => "Editar archivo",
        'file:more' => "M&aacute;s ficheros",
        'file:list' => "vista de lista",
        'file:group' => "Ficheros del grupo",
        'file:gallery' => "vista de galer&iacute;a",
        'file:gallery_list' => "Vista de galer&iacute;a o lista",
        'file:num_files' => "Cantidad de ficheros a mostrar",
        'file:user:gallery'=>'Vista %s galer&iacute;a',
        'file:via' => 'ficheros v&iacute;a',
        'file:upload' => "Subir un fichero",
        'file:replace' => 'Reemplazar contenido de fichero (dejar en blanco para no modificar)',
        'file:list:title' => "%s - %s %s",
        'file:title:friends' => "De amigos",

        'file:add' => 'Subir un fichero',

        'file:file' => "Fichero",
        'file:title' => "T&iacute;tulo",
        'file:desc' => "Descripci&oacute;n",
        'file:tags' => "Tags",

        'file:types' => "Tipos de ficheros subidos",

        'file:type:' => 'Ficheros',
        'file:type:all' => "Todos los ficheros",
        'file:type:video' => "Videos",
        'file:type:document' => "Documentos",
        'file:type:audio' => "Audio",
        'file:type:image' => "Imagenes",
        'file:type:general' => "General",

        'file:user:type:video' => "Videos de %s",
        'file:user:type:document' => "Documentos de %s",
        'file:user:type:audio' => "Audio de %s",
        'file:user:type:image' => "Imagenes de %s",
        'file:user:type:general' => "Ficheros generales de %s",

        'file:friends:type:video' => "Videos de amigos",
        'file:friends:type:document' => "Documentos de amigos",
        'file:friends:type:audio' => "Audio de amigos",
        'file:friends:type:image' => "Imagenes de amigos",
        'file:friends:type:general' => "Ficheros generales de amigos",

        'file:widget' => "Widget de ficheros",
        'file:widget:description' => "Ver los &uacute;ltimos ficheros",

        'groups:enablefiles' => 'Habilitar ficheros de grupos',

        'file:download' => "Descargar",

        'file:delete:confirm' => "Desea eliminar este fichero?",

        'file:tagcloud' => "Tag cloud",

        'file:display:number' => "Cantidad de ficheros a mostrar",

        'river:create:object:file' => '%s subi&oacute; el fichero %s',
        'river:comment:object:file' => '%s coment&oacute; en el fichero %s',

        'item:object:file' => 'Ficheros',

        /**
         * Embed media
         **/
            'file:embed' => "Incrustar multimedia",
            'file:embedall' => "Todo",

        /**
         * Status messages
         */
            'file:saved' => "Fichero guardado correctamente.",
            'file:deleted' => "Fichero eliminado correctamente.",

        /**
         * Error messages
         */
            'file:none' => "No se subieron ficheros.",
            'file:uploadfailed' => "Lo sentimos, no se pudo guardar el fichero.",
            'file:downloadfailed' => "Lo sentimos, el fichero no est&aacute; disponible en este momento.",
            'file:deletefailed' => "Su fichero no puede ser eliminado en este momento.",
            'file:noaccess' => "No posee los permisos necesarios para modificar el fichero",
            'file:cannotload' => "Ha ocurrido un error al intentar cargar el fichero",
            'file:nofile' => "Debe seleccionar un fichero",
);
add_translation("es", $language);
}
