<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Ma page</title>
      <meta charset="utf-8">
	    <link rel="stylesheet"  href="vue/Style/style.css" />
    </head>
  	<body>

      <fieldset>
        <legend>Consulter un planning</legend>
        <form method="post" action="site.php">
          <label for="edt_cons">Consulter l'EDT d'un conseilller<input type="radio" id="edt_cons" name="selection" value="edt_conseiller"/>
          <input type="radio" name="selection" value="edt_jour"/>
          <input type='submit' name='validation' value="Valider choix"/>
        </form>
      </fieldset>
  <?php echo $contenuselect ?>
	<?php echo $selectionDate ?>
	<?php echo $contenuEDT ?>


  	</body>
 </html>
