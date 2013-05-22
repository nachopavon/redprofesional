<?php
if (elgg_is_logged_in()) {

    add_translation("es", array('thewire:ask:status' => '¿En qué estás trabajando?'));
    add_translation("en", array('thewire:ask:status' => 'what are you working?'));

    $form_vars = array('class' => 'thewire-form');
    echo '<div id="ask_status">'.elgg_echo('thewire:ask:status').'</div>';
    echo elgg_view_form('thewire/add', $form_vars);
}

?>
