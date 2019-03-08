<?php
function connecter()
{
    $hote='localhost';
    $utilisateur ='root';
    $pass='';
    $base='eboutique';
	$connexion = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $pass);
	
    //Partie à compléter

    return $connexion;
}
?>