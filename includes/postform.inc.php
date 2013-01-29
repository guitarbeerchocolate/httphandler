<form action="httphandler.class.php" method="POST">
<input name="method" type="hidden" value="dothepost" />
<input name="webpath" type="hidden" value="<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" />
<input name="text" type="text" /><br />
<input type="submit" />
</form>