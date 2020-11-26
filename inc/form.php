<?php
 return'
<h2> Contact us </h2>
<form action="'. admin_url("admin-ajax.php")  . '" method="post">
  <input type="hidden" name="action" value="user_submission">
  Your name:<br>
  <input required name="solid-name" type="text" value="" size="30" /><br>
  Your email:<br>
  <input required name="solid-email" type="email" value="" size="30" /><br>
  Your message:<br>
  <textarea required name="solid-message" rows="7" cols="30"></textarea><br>
  <input type="submit" value="submit" />
</form>
';
