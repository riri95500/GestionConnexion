<!-- <form action="">
	<label>Click on for deconnect you :<input type="submit" name="action" value=deconnexion></label>
</form> -->
<?php
session_start();
$_SESSION = array(); //Supprime toutes les variables crées de la session
session_destroy();
header('Location: formulaire.php');
?>
