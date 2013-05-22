<?php
$language = array(
// Main Title
'faq' => "Términos",
'faq:title' => "Términos que deberías conocer",
'faq:shorttitle' => "Términos",
'faq:sidebar:categories' => "Categorías de Términos",

'item:object:faq' => "Objeto Término",

// add
'faq:add' => "Nuevo Término",
'faq:add:title' => "Nuevo término",
'faq:add:question' => "Término",
'faq:add:category' => "Categoría",
'faq:add:answer' => "Explicación",

'faq:add:oldcat:please' => "Seleccciona una categoría",
'faq:add:oldcat:new' => "Escribe una nueva Categoría",

'faq:add:check:question' => "Por favor escribe el término propuesto",
'faq:add:check:category' => "Por favor escribe una categoría",
'faq:add:check:answer' => "Por favor escribe una explicación.",

'faq:add:error:invalid_input' => "Error saving: invalid input, please check all the fields.",
'faq:add:error:save' => "Unknown error while saving.",
'faq:add:success' => "Se añadió un nuevo término con éxito.",

// edit
'faq:edit:title' => "Editar Término",
'faq:edit:error:invalid_input' => "Error saving: invalid input, please check all the fields.",
'faq:edit:error:invalid_object' => "Error editing: invalid object, looks like the faq you are trying to edit doesn't exist.",
'faq:edit:error:save' => "Unknown error while saving.",
'faq:edit:success' => "Se editó el término con éxito.",

// delete
'faq:delete:confirm' => "Está seguro de querer eliminar este término?",
'faq:delete:success' => "Se eliminó el término con éxito.",

// settings
'faq:settings:public' => "Should the FAQ be publicly available (otherwise only for admins)? ",
'faq:settings:publicAvailable_sitemenu'  => "Should the FAQ site menu entry be visible when not logged in? ",
'faq:settings:publicAvailable_footerlink' => "Should the FAQ link in the site footer be visible when not logged in? ",
'faq:settings:ask' => "Allow users to ask questions? ",
'faq:settings:minimum_search_tag_size' => "Minimum size of searchtags: ",
'faq:settings:minimum_hit_count' => "Minimum hitcount: ",

// search
'faq:search:noresult' => "No results were found.",
'faq:search:hitcount' => "Hitcount: ",
'faq:search:title' => "Buscar término",
'faq:search:label' => "Por favor introduzca la palabra a buscar: ",
'faq:search:description' => "(La longitud mínima es de %s caracteres. Un término debe aparecer al menos  %s vez/veces.)",

// List a category
'faq:list:category_title' => "Categoría: ",
'faq:list:no_category' => "No se proporcionó una categoría.",
'faq:list:edit:new_category' => "Por favor proporcione una nueva categoría.",
'faq:list:edit:confirm:question' => "Seguro que quiere mover ",
'faq:list:edit:confirm:category' => " preguntas(s) a la categoría ",
'faq:list:edit:category:please' => "Please select one or more questions to move.",
'faq:list:edit:begin' => "Cambiar categoría",
'faq:list:edit:all' => "Seleccionar todo",
'faq:list:edit:none' => "Seleccionar nada",
'faq:list:edit:select:choice' => "- Por favor seleccione una categoría",
'faq:list:edit:select:new' => "- Crear una nueva categoría",

// Change category
'faq:change_category:description' => "Seleccione al menos una de las preguntas qpara mover a otra categoría. Luego seleccione la categoría.",
'faq:change_category:new_category' => "Nueva categoría: ",
'faq:change_category:error:input' => "Invalid input provided.",
'faq:change_category:error:no_faq' => "No se provee ningún objeto Término.",
'faq:change_category:error:save' => "There was an error while saving the FAQ, please try again.",
'faq:change_category:success' => "Elñ término se guarfó correctamente.",

// Ask a question
'faq:ask' => "Proponer un nuevo término",
'faq:ask:title' => "Proponer un término que no se encuentre en la lista",
'faq:ask:label' => "No se pudo encontrar un término existente. Propón la inclusión del nuevo término aquí: ",
'faq:ask:description' => "(El término puede ser aceptado, o no. De cualquier forma recibirás una notificación referente al mismo.)",
'faq:ask:button' => "Proponer",
'faq:ask:new_question:subject' => "Has propuesto un nuevo término",
'faq:ask:new_question:message' => "Gracias po proponer un nuevo término.

Intentaremos resolver sobre tu nuevo término:

%s

tan pronto como sea posible.

Se decidirá si es posible añadir el nuevo término que has propuesto. De cualquier forma serás notificado sobre la inclusión del término en el sistema.",

'faq:ask:new_question:send' => "Tu proposición se ha añadido, recibirás una notificación al respecto.",
'faq:ask:error:not_send' => "Tu proposición se ha añadido, pero ha sido imposible enviarte una notificación al respecto",
'faq:ask:error:save' => "Hubo un problema al añadir tu proposición, por favor inténtalo de nuevo más tarde",
'faq:ask:error:no_user' => "Ocurrió un error, por favor entra con usuario autorizado",
'faq:ask:error:input' => "An error occured, invalid input. Please try again.",
'faq:ask:notify:admin:subject' => "Hay una nueva proposición de término",
'faq:ask:notify:admin:message' => "Estimado %s,

A new question has been asked in the FAQ.

To check out the outstanding question(s) please click here:
%s",

// View asked questions
'faq:asked' => "User questions (%s)",
'faq:asked:title' => "User submitted questions",
'faq:asked:no_questions' => "No unanswered questions at the moment.",
'faq:asked:not_allowed' => "User are currently not allowed to submit questions. If you would like to allow this, check the Plugin Settings.",
'faq:asked:added' => "Added:",
'faq:asked:add' => "Add this question to the FAQ",
'faq:asked:by' => "asked by: ",
'faq:asked:check:add' => "Please select if this question should be added to the FAQ",

// Answer an asked question
'faq:answer:notify:subject' => "Your question has been answered",
'faq:answer:notify:message:added:same' => "The question:
%s

you asked has been answered. The answer can be found here:

%s

And as you can see your question has been added to the FAQ.",

'faq:answer:notify:message:added:adjusted' => "The question:
%s

you asked has been answered. However we adjusted the question to:
%s

The answer can be found here:

%s

And as you can see your question has been added to the FAQ.",

'faq:answer:success:added:send' => "The question was added to the FAQ and the User notified.",
'faq:answer:error:added:not_send' => "The question was added to the FAQ, however the User could not be notified.",
'faq:answer:error:save' => "There was an error while saving the FAQ.",
'faq:answer:error:remove' => "There was an error while removing the question, please try again.",
'faq:answer:error:no_cat' => "Error: invalid category provided, please try again.",
'faq:answer:notify:not_added:same' => "The question:
%s

you asked has been answered. The answer is:

%s

Your question was NOT added to the FAQ.",

'faq:answer:notify:not_added:adjusted' => "The question:
%s

you asked has been answered. However we adjusted the question to:
%s

The answer is:

%s

Your question was NOT added to the FAQ.",

'faq:answer:success:not_added:send' => "The User has been notified of the answer.",
'faq:answer:error:not_added:not_send' => "There was an error while notifying the User.",
'faq:answer:error:no_faq' => "Error: not a valid FAQ object.",
'faq:answer:error:input' => "Error: invalid input, please try again.",

// Stats page
'faq:stats:categories' => "This FAQ contains %s categories,",
'faq:stats:questions' => " with %s questions/answers in total.",
'faq:stats:user' => "There are %s outstanding user questions that need an answer.",
);

add_translation("es", $language);
