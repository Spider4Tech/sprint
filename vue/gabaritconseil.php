<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Ma page</title>
      <meta charset="utf-8">
	    <!-- <link rel="stylesheet"  href="vue/style/style.css" /> -->
    </head>
  	<body>

      <fieldset>
        <legend>Consulter un planning</legend>
        <form method="post" action="site.php">
          <label for="edt_cons">Consulter l'EDT d'un conseilller</label><input type="radio" id="edt_cons" name="selection" value="edt_conseiller" required/><br/>
          <label for="edt_jour">Consulter l'EDT d'un jour</label><input type="radio" name="selection" value="edt_jour" required/><br/>
          <input type='submit' name='validation' value="Valider choix" />
        </form>
      </fieldset>
      <?php echo $contenu ?>
      <fieldset>
        <legend>Inscrire un nouveau client à la banque</legend>
        <form method="post" action="site.php">
          <p><label for="nom">nom :</label><input type="text" id="nom" name="nouv_nom" required/></p>
          <p><label for="prenom">prenom :</label><input type="text" id="prenom" name="nouv_prenom" required/></p>
          <p><label for="date">Date de naissance :</label><input type="date" id="date" name="nouv_date" required/></p>
          <p><p><label for="adresse">Adresse :</label><input type="text" id="adresse" name="nouv_adresse" required/></p>
          <p><label for="telephone">Telephone :</label><input type="text" id="telephone" name="nouv_telephone" required/></p>
          <p><label for="mail">Email :</label><input type="text" id="mail" name="nouv_mail" required/></p>
          <p><label for="profession">Profession</label><input type="text" id="profession" name="nouv_profession" required/></p>
          <p><label for="situation">Situation :</label><input type="text" id="situation" name="nouv_situation" required/></p>
          <p><label for="cons">Conseiller :</label><input type="number" id="cons" name="nouv_cons" required/></p>
          <p><input type='submit' name='validation_nouv_client' value="Valider saisie" />
        </form>
      </fieldset>
      <fieldset>
        <legend>Modifier la valeur d'un découvert</legend>
      <form action="site.php" method='post'>
        <p>Choisissez l'ID du compte à modifier</p>
        <?php echo $contenu_les_comptes ?>
        <p><input type="submit" value="Valider" name="choix_compte"/></p>
      </form>
    </fieldset>
      <fieldset>
        <legend>Se déconnecter</legend>
      <form action="site.php" method='post'>
        <p><input type="submit" value="Disconnect" name="disconnect"/></p>
      </form>
    </fieldset>

  	</body>
 </html>
