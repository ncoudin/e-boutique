<?php
//session_start();
include_once('connexion.inc.php');
include_once('entete.php');
echo "<h2> Votre panier </h2>\n";

switch ($_POST['envoi'])
{
// L'utilisateur est déjà inscrit
case "Se connecter" :
    $pseudo = $_POST['pseudo'];
    $mot_de_passe= $_POST['motdepasse'];
    $connexion = connecter();
    $sql = "SELECT * FROM client WHERE pseudo = '$pseudo' AND mdp ='$mot_de_passe' ;";
    $resultat = $connexion->query($sql);
    if($resultat->rowCount() == 1)
    {
    	echo"Vous êtes connecté sous le compte : \"$pseudo\"";
    	$_SESSION['pseudo']=$pseudo;
    }
    else
    {
    	echo"Mauvais mot de passe ou nom de compte, <a href='connecter.php'> réessayez.</a>";
    }
    $connexion=null;
  
break;

// L'utilisateur veut s'inscrire
case "S'inscrire" :
    // Recuperation des données dans le $_POST
    $pseudo       = $_POST['pseudo'];
    $mot_de_passe = $_POST['motdepasse'];
    $mot_de_passe2= $_POST['motdepasse2'];
    $nom          = $_POST['nom'];
    $prenom       = $_POST['prenom'];
    $date         = $_POST['datenaiss'];
    $adresse      = $_POST['adresse'];
    $code         = $_POST['code'];
    $ville        = $_POST['ville'];
    $courriel     = $_POST['courriel'];
    // Vérification des valeurs
    if (($mot_de_passe != $mot_de_passe2)
      or empty($pseudo)
      or empty($mot_de_passe)
      or empty($nom)
      or empty($prenom)
      or empty($date)
      or empty($adresse)
      or empty($code)
      or empty($ville)
      or empty($courriel))
    {
        echo 'Inscription non-valide. ';
        echo '<a href="inscription.php"> Réessayez. </a>';
    }
    else
    {
        // Connexion à la base MySQL
        $connexion = connecter();
        // Vérifier que le pseudo n'est pas déjà existant
        $sql = "SELECT * FROM client WHERE pseudo='$pseudo';";
        $resultat = $connexion->query($sql);
        if ($resultat->rowCount() != 0) {
            echo "Le pseudo « $pseudo » est déjà pris. ";
            echo '<a href="inscription.php"> Réessayez. </a>';
        }
        else
        {   // Ajouter le nouveau client
            $sql ='INSERT INTO client (pseudo, nom, prenom, datecli, adresse, cp, ville, mail, mdp)';
            $sql.=" VALUES ('$pseudo', '$nom', '$prenom', '$date', '$adresse', '$code', '$ville', '$courriel','$mot_de_passe') ;";
            $resultat = $connexion->exec($sql);
            echo"<p> Inscription réussie, vous pouvez désormais vous connecter !";
        }
        $connexion=null;
    }

break;

case "Voir votre panier" :
	$nb = count($_SESSION['produit']);
	if($nb==NULL)
	{
		echo"Vous n'avez choisi aucun produit !
			 <br/>Choisissez en à la <a href='produits.php'>boutique</a> ! </p>";
	}
	else
	{
		$connexion = connecter();
    echo"<table style='width:30%'>
    	 <tr><td><b>Référence</b></td>
    	 	 <td><b>Produit</b></td>
    	 	 <td><b>Prix unitaire</b></td>
    	 	 <td><b>Quantité</b></td>
    	 	 <td><b>Montant</b></td>";
    $nb = count($_SESSION['produit']);
    $total=0;
	    for($x=0;$x<$nb;$x++)
	    {
	    	$produit=$_SESSION['produit'][$x];
	    	$quantite=$_SESSION['quantite'][$x];
	    	$sql="select * from produit where designation = '$produit';";
	    	$resultat=$connexion->query($sql);
	    	$ligne=$resultat->fetch();
	    	$prix=$ligne['prix'];
	    	$ref=$ligne['ref'];
	    	$montant=$prix*$quantite;
	    	echo"<tr><td>$ref</td>
	    			 <td>$produit</td>
	    			 <td>$prix €</td>
	    		     <td>$quantite</td>
	    		     <td>$montant €</td>
	    		 </tr>";
	    	$total+=$montant;
	    }
    echo"<tr>
    	 	<td colspan='4'><b>Total</b></td>
    	 	<td><b>$total €</b></td>
    	 </tr>
    	 </table>
    	 <br/>
    	 <form action='panier.php' method='post'>
    	 <input type='submit' name='envoi' value='Vider le panier'/>
    	 <br/>
    	 <input type='submit' name='envoi' value='Valider la commande'/>
    	 </form>
    	 <br/>
    	 <a href='produits.php'>Revenir à la boutique</a>";
	}

break;

case "Ajouter au panier" :
	if (!isset($_SESSION['produit']))
    	{
        	$_SESSION['produit']=array();
        	$_SESSION['quantite']=array();
    	}
    $nb = count($_SESSION['produit']);
    $ajout=1;
    for($x=0;$x<$nb;$x++)
    {
    	$produit=$_SESSION['produit'][$x];
    	$quantite=$_SESSION['quantite'][$x];
    	if($produit==$_POST['produit'])
    	{
    		$_SESSION['quantite'][$x]+=$_POST['quantite'];
    		$ajout=0;
    	}
    }
    if($ajout==1)
    {
    	$_SESSION['produit'][$nb] = $_POST['produit'];
    	$_SESSION['quantite'][$nb] = $_POST['quantite'];
    }
    $connexion = connecter();
    echo"<table style='width:30%'>
    	 <tr><td><b>Référence</b></td>
    	 	 <td><b>Produit</b></td>
    	 	 <td><b>Prix unitaire</b></td>
    	 	 <td><b>Quantité</b></td>
    	 	 <td><b>Montant</b></td>";
    $nb = count($_SESSION['produit']);
    $total=0;
    for($x=0;$x<$nb;$x++)
    {
    	$produit=$_SESSION['produit'][$x];
    	$quantite=$_SESSION['quantite'][$x];
    	$sql="select * from produit where designation = '$produit';";
    	$resultat=$connexion->query($sql);
    	$ligne=$resultat->fetch();
    	$prix=$ligne['prix'];
    	$ref=$ligne['ref'];
    	$montant=$prix*$quantite;
    	echo"<tr><td>$ref</td>
    			 <td>$produit</td>
    			 <td>$prix €</td>
    		     <td>$quantite</td>
    		     <td>$montant €</td>
    		 </tr>";
    	$total+=$montant;
    }
    echo"<tr>
    	 	<td colspan='4'><b>Total</b></td>
    	 	<td><b>$total €</b></td>
    	 </tr>
    	 </table>
    	 <br/>
    	 <form action='panier.php' method='post'>
    	 <input class='bouton' type='submit' name='envoi' value='Vider le panier'/>
    	 <br/>
    	 <input class='bouton' type='submit' name='envoi' value='Valider la commande'/>
    	 </form>
    	 <br/>
    	 <a href='produits.php'>Revenir à la boutique</a>";
break;

case "Vider le panier" :
	$_SESSION['produit']=NULL;
    $_SESSION['quantite']=NULL;
    echo"<p>Le panier a été vidé avec succès !
    	 <br/>Vous pouvez revenir <a href='produits.php'>faire un tour à la boutique</a> ! </p>";

break;

case "Valider la commande" :
	if(empty($_SESSION['pseudo']))
	{
		echo"Veuillez vous <a href='connecter.php'>connecter</a> avant de valider votre commande !";
	}
	else
	{
		$connexion=connecter();
		$pseudo=$_SESSION['pseudo'];
		$nb = count($_SESSION['produit']);
		$timestamp=date_timestamp_get(date_create());
		$jour=date('Y-m-d');
		$sql="INSERT INTO commande VALUES ('$pseudo','$timestamp','$jour');";
		$resultat = $connexion->exec($sql);
    	for($x=0;$x<$nb;$x++)
    	{
    		$produit=$_SESSION['produit'][$x];
    		$quantite=$_SESSION['quantite'][$x];
    		$sql="select * from produit where designation = '$produit';";
    		$resultat=$connexion->query($sql);
    		$ligne=$resultat->fetch();
    		$ref=$ligne['ref'];
    		$sql="INSERT INTO contenir VALUES ('$pseudo','$timestamp','$ref','$quantite');";
    		$resultat = $connexion->exec($sql);
    	}
    	echo"Votre commande a été enregistrée dans notre base de données !
    		 <br/>Référence : $pseudo/$timestamp";
    	$_SESSION['produit']=NULL;
    	$_SESSION['quantite']=NULL;
	}

break;
// Autre ?
//default:
}



include_once('pied.html');
?>