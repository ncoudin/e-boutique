<?php
include_once('entete.php');
?>
<br>
<div>
<form action="panier.php" method="post">
  <fieldset>
    <legend> Inscrivez-vous </legend>
    <table class='connexion'>
      <tbody>
        <tr>
          <th> <label for="pseudo"> Pseudo : </label> </th>
          <td> <input type="text" id="pseudo" name="pseudo" size="40" maxlength="40"></td>
        </tr>
        <tr>
          <th> <label for="motdepasse"> Mot de passe : </label> </th>
          <td> <input type="password" id="motdepasse" name="motdepasse" size="20" maxlength="20"></td>
        </tr>
        <tr>
          <th> <label for="motdepasse2"> Confirmation du mot de passe : </label> </th>
          <td> <input type="password" id="motdepasse2" name="motdepasse2" size="20" maxlength="20"></td>
        </tr>
        <tr>
          <th> <label for="nom"> Nom : </label> </th>
          <td> <input type="text" id="nom" name="nom" size="20" maxlength="20"></td>
        </tr>
        <tr>
          <th> <label for="prenom"> Prénom : </label> </th>
          <td> <input type="text" id="prenom" name="prenom" size="20" maxlength="20"></td>
        </tr>
        <tr>
          <th> <label for="datenaiss"> Date de naissance : </label> </td>
          <td> <input type="date" id="datenaiss" name="datenaiss"> </td>
        <tr>
          <th> <label for="adresse"> Adresse : </label> </th>
          <td> <input type="text" id="adresse" name="adresse" size="40" maxlength="40"></td>
        </tr>
        <tr>
          <th> <label for="code"> Code postal : </label> </th>
          <td> <input type="text" id="code" name="code" size="5" maxlength="5"></td>
        </tr>
        <tr>
          <th> <label for="ville"> Ville : </label> </th>
          <td> <input type="text" id="ville" name="ville" size="40" maxlength="40"></td>
        </tr>
        <tr>
          <th> <label for="courriel"> Courriel : </label> </th>
          <td> <input type="email" id="courriel" name="courriel" size="40" maxlength="40"></td>
        </tr>
      </tbody>
    </table>
  <input class='bouton' type="submit" name="envoi" value="S'inscrire">
  </fieldset>
</form>
</div>
<div>
<center>
<a href="connecter.php"> Vous êtes déjà inscrit(e) ? Connectez-vous </a>
</center>
</div>

<?php
include_once('pied.html');
?>

