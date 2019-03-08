<?php
if($_POST['connection']=='Se déconnecter')
{
	session_start();
	$_SESSION['pseudo']=NULL;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <link href="style.css" rel="stylesheet" type="text/css">
  <meta charset="utf-8">
  <title> Jeux en ligne </title>
  <br/>
  <table style="width:100%" border="1">
  <tr>
    <center> <a href="index.php"> <img src="banner.png" height="150"> </a> </center>
  </tr>
  <tr>
    <td width="25%"> <center> <b> <a href="produits.php"> Nos produits </a> </b> </center> </td>
    <td width="25%"> <center> <b> <a href="actualites.php"> Actualit&eacute;s  </a> </b> </center> </td>
    <td width="25%"> <center> <b> <a href="connecter.php"> Se connecter </a> </b> </center> </td>
    <td width="25%"> <center> <b> <a href="contacter.php"> Nous contacter </a> </b> </center> </td>
    </b>
  </tr>
  </table>
</head>
<header>
</header>
<body>
<h2>
Accueil
</h2>
<?php
include_once('pied.html');
?>
