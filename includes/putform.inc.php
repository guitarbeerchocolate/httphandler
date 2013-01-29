<form action="httphandler.class.php" method="PUT">
<input name="method" type="hidden" value="dotheput" />
<input name="webpath" type="hidden" value="<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" />
<input name="text" type="text" /><br />
<input type="submit" />
</form>