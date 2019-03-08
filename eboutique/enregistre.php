<?php
session_start();
if(empty($_SESSION['pseudo']))
{

}
else
{
	$pseudo=$_SESSION['pseudo'];
	echo"<fieldset style='width:30%'> Vous êtes connecté sous le pseudo $pseudo 
		 <form action='deconnexion.php' method='post'>
		 <input type='submit' name='connection' value='Se déconnecter'/>
		 </form>
		 </fieldset>";
}
?>