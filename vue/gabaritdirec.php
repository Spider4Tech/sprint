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
        <form method="post">
        <legend>Changer identifiant employé</legend><br/>
        <input type="text" name="login1" id="login1" placeholder="Ancien identifiant" required>
        <input type="password" name="password2" id="password2" placeholder="ancien mdp" required><br/>
        <input type="text" name="login2" id="login2" placeholder="nouveau identifiant" required>
        <input type="password" name="password1" id="password1" placeholder="nouveau mdp" required><br/>
        <input type="submit" name="formsend" id="formsend"><br/><br/>
        </form>
        
        <form method="post">
        <legend>gestion contrat</legend><br/>
        <select name="gestionnaire ctrt">
        	<option>suppression </option>
        	<option>ajout</option>
        	<option>Modification</option>
        </select>
        Entrée : <input type="text" name="entrée" id="entrée" placeholder="nom contrat" required>
        </form><br/>
        
        <form method="post">
        <legend>gestion pièce contrat</legend><br/>
        <select name="gestionnaire pièce à fournir">
        	<option>suppression </option>
        	<option>ajout</option>
        	<option>Modification</option>
        </select>
        pièce à fournir : <input type="text" name="entrée1" id="entrée1" placeholder="pièce contrat" required>
        </form><br/>
        
        <form method="post">
        <legend>gestion capital et statistique</legend><br/>
        <select name="gestionnaire pièce à fournir">
        	<option>Contrat souscris </option>
        	<option>Nombre de rdv</option>
        	<option>nombre total de client</option>
          <option>solde des client</option>
        </select>
        pièce à fournir : <input type="text" name="entrée1" id="entrée1" placeholder="pièce contrat" required>
        </form>        
        
      <?php
        echo $contenu;
      ?>
  	</body>
 </html>
