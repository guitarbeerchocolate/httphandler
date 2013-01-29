<html>
<?php
if(isset($_GET['message']))
{
	echo 'message is '.urldecode($_GET['message']);
}
// include 'includes/getform.inc.php';
// include 'includes/postform.inc.php';
// include 'includes/putform.inc.php';
// include 'includes/fileuploadform.inc.php';
// include 'includes/fileuploadformmulti.inc.php';
?>
</html>