<form enctype="multipart/form-data" action="httphandler.class.php" method="POST">
<input name="method" type="hidden" value="singleuploadfile" />
<input name="webpath" type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
<input name="uploaded" type="file" /><br />
<input type="submit" value="Upload" />
</form>