<?php 
include('entete.php');
include_once('connexion.inc.php');
echo "<h2>Nos produits</h2>";
$connexion=connecter();
$sql="select * from produit order by ref;";
$resultat=$connexion->query($sql);
echo "<table style='width:60%' class='produit'>";
echo"<tr>
		<th>Nom</th>
		<th>Image</th>
		<th>Prix</th>
	 </tr>";
while($ligne=$resultat->fetch())
{
	$nom=$ligne['designation'];
	$image=$ligne['image'];
	$prix=$ligne['prix'];
	echo"<tr>
		 	<td>$nom</td>
		 	<td><img src='voiture/$image'></td>
		 	<td>$prix €</td>
		 </tr>";
}
echo "</table>
	  <br/>
	  <div class='boutonpanier'>
	  <form action='panier.php' method='post'>
	  <select name='produit'>";
$resultat=$connexion->query($sql);
while($ligne=$resultat->fetch())
{
	$nom=$ligne['designation'];
	echo"<option>$nom";
}
echo"</select>
	 <label for='quantite'>Quantité :</label>
	 <input type='number' name='quantite' value='1' min='1' max='20'/>
	 <input class='bouton' type='submit' name='envoi' value='Ajouter au panier'/>
	 </form>
	 <form action='panier.php' method='post'>
	 <input class='bouton' type='submit' name='envoi' value='Voir votre panier'/>
	 </form>
	 </div>";
include_once('pied.html'); ?>