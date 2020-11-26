<?php
return'
<form action="'. get_permalink(find_thank_you_page()) . '">
  <input type="hidden" name="action" value="submit">
  Your name:<br>
  <input name="your-name" type="text" value="" size="30" /><br>
  Your email:<br>
  <input name="your-email" type="text" value="" size="30" /><br>
  Your message:<br>
  <textarea name="-your-message" rows="7" cols="30"></textarea><br>
  <input type="submit" value="submit" />
</form>
';
