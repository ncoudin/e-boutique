<?php
include_once('entete.php');
?>
<br>
<div>
<form action="panier.php" method="post">
  <fieldset>
    <legend> Connectez-vous </legend>
    <table class='connexion'>
      <tbody>
        <tr>
          <th>Pseudo : </th>
          <td> <input type="text" name="pseudo" size="20" maxlength="20"></td>
        </tr>
        <tr>
          <th>Mot de passe : </th>
          <td> <input type="password" name="motdepasse" size="20" maxlength="20"></td>
        </tr>
      </tbody>
    </table>
    <div>
      <input class='bouton' type="submit" name="envoi" value="Se connecter">
    </div>
  </fieldset>
</form>
</div>
<div>
<center>
<a href="inscription.php"> Vous n'avez pas de compte ? S'inscrire </a>
</center>
</div>

<?php
include_once('pied.html');
?>

