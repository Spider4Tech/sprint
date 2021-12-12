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
        <form method="post" action="site.php">
          <fieldset>
            <legend>Changer identifiant employé</legend>
            <p>
              <input type="text" name="login1" id="login1" placeholder="Ancien identifiant" required>
              <input type="password" name="password2" id="password2" placeholder="ancien mdp" required>
            </p>
            <p>
              <input type="text" name="login2" id="login2" placeholder="nouveau identifiant" required>
              <input type="password" name="password1" id="password1" placeholder="nouveau mdp" required>
            </p>
            <input type="submit" name="changementcompte" id="formsend">
          </fieldset>
        </form>
        <form method="post" action="site.php">
          <fieldset>
            <legend>gestion contrat</legend>
            <p> <select name="gestionnaire ctrt">
              <option>suppression </option>
              <option>ajout</option>
              <option>Modification</option>
              </select>
                Entrée : <input type="text" name="entrée" id="entrée" placeholder="nom contrat" required>
            </p>
            <input type="submit" name="changementcompte" id="formsend">
          </fieldset>
        </form>
        <form method="post" action="site.php">
          <fieldset>
            <legend>gestion pièce contrat</legend>
            <p>
              <select name="gestionnaire pièce à fournir">
              	<option>suppression </option>
              	<option>ajout</option>
              	<option>Modification</option>
              </select>
              pièce à fournir : <input type="text" name="entrée1" id="entrée1" placeholder="pièce contrat" required>
            </p>
            <input type="submit" name="changementcompte" id="formsend">
          </fieldset>
        </form>
        <form method="post" action="site.php">
          <fieldset>
            <legend>gestion capital et statistique</legend>
            <p>
              <select name="gestionnaire pièce à fournir">
              	<option>Contrat souscris </option>
              	<option>Nombre de rdv</option>
              	<option>nombre total de client</option>
                <option>solde des client</option>
              </select>
            date 1 : <input id="date" type="date" value="2021-12-14" required>
            date 2 : <input id="date2" type="date" value="2021-12-15" required>
            </p>
            <input type="submit" name="changementcompte" id="formsend">
          </fieldset>
        </form>

      <?php
        echo $contenu;
      ?>
  	</body>
 </html>
