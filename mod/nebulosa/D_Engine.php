<?php


/**************************************************************************
::Dhrup Messages system Engine All rights reserved. www.embrache.com ::

System Messages Developed by Dhrup

Visit him at www.embrache.com and also at http://community.elgg.org/pg/profile/Dhrup2000

Don't remove this comment. This is a very important engine that he developed.
**************************************************************************/

?>

<script type="text/javascript">
$(document).ready(function () {
$('.messages').animate({opacity: 1.0}, 90000);
$('.messages').fadeOut('slow');

$('span.closeMessages a').click(function () {
$(".messages").stop();
$('.messages').fadeOut('slow');
return false;
});

$('div.messages').click(function () {
$(".messages").stop();
$('.messages').fadeOut('slow');
return false;
});
});
</script>
<script type="text/javascript">
$(document).ready(function () {
$('.messages_error').animate({opacity: 1.0}, 90000);
$('.messages_error').fadeOut('slow');

$('span.closeMessages a').click(function () {
$(".messages_error").stop();
$('.messages_error').fadeOut('slow');
return false;
});

$('div.messages').click(function () {
$(".messages").stop();
$('.messages').fadeOut('slow');
return false;
});
});
</script>


<?php $messages = system_messages();

$message = $messages['messages'];
if(count($_SESSION['msg']['error'])>0)	// :DC: we only want the (login) error messages for now
{										// :DC: more message types later as needed eg ['success']
	echo '<div class="messages_error">';
	echo '<span class="closeMessages"><a href="#">click to dismiss</a></span>';
	foreach($_SESSION['msg']['error'] as $ErrMsgLine1)
		echo "<p style='color:black; font-size: 18px; font-weight: bold;'>$ErrMsgLine1</p>";
	echo '</div>';
}//:DC:
unset($_SESSION['msg']['error']);//:DC:

?>