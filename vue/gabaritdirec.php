<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Ma page</title>
      <meta charset="utf-8">
	    <link rel="stylesheet"  href="vue/Style/style.css" />
    </head>
  	<body>
      <div class="main">
        <form id="agentedit" action="site.php" method='post'>
          <fieldset>
            <legend>Ajout d'Employée</legend>
            <p>
              login : <input type="text" name="logincompte"/>
            </p>
            <p>
              Mot de passe : <input type="password" name="mdp"/>
            </p>
            <p>
              Rang : <select name="rang">
                <option value="Agent">Agent</option>
                <option value="Conseiller">Conseiller</option>
              </select>
            </p>
            <p>
              <input type="submit" value="Ajouter" name="ajoutemployer"/>
            </p>
          </fieldset>
        </form>
      <?php
        echo $contenu;
      ?>
  	</body>
 </html>
