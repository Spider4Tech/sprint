<!DOCTYPE html>
<html lang="fr">
  <head>
   
    <title>directeur</title>
      <meta charset="utf-8">
	    <link rel="stylesheet"  href="vue/style/style.css" />
  </head>
  	<body>
      <div class="main">
        <form id="agentedit" action="site.php" method='post'>
          <fieldset>
            <!-- ajoute employé -->
            <legend>Ajout d'Employée</legend>
            <p>
              login : <input type="text" name="logincompte" maxlength="12"/>
            </p>
            <p>
              Mot de passe : <input type="password" name="mdp" maxlength="14"/>
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
            <!-- edition id employé -->
            <legend>Changer identifiant employé</legend>
            <p>
              <input type="text" name="alogin" id="login1" placeholder="Ancien identifiant" maxlength="12" required>
              <input type="password" name="amdp" id="password2" placeholder="ancien mdp" maxlength="14" required>
            </p>
            <p>
              <input type="text" name="nlogin" id="login2" placeholder="nouveau identifiant" maxlength="12" required>
              <input type="password" name="nmdp" id="password1" placeholder="nouveau mdp" maxlength="14" required>
            </p>
            <input type="submit" name="changementcompte" id="formsend">
          </fieldset>
        </form>
        <form method="post" action="site.php">
          <fieldset>
            <!-- ajout del et edit de contrat -->
            <legend>gestion contrat</legend>
            <p> <select name="gestionnaire_ctrt">
              <option value="suppression">suppression</option>
              <option value="ajout">ajout</option>
              <option  value="modification">Modification</option>
              </select>
                Entrée : <input type="text" name="entrée" id="entrée" placeholder="nom contrat" maxlength="19" required></br>
                edition : <input type="text" name="modif" id="modif" placeholder="modifier contrat" maxlength="19">
            </p>
            <input type="submit" name="gestioncontrat" id="formsend">
          </fieldset>
        </form>
        <form method="post" action="site.php">
          <fieldset>
            <!-- ajout del et edit pièce de contrat -->
            <legend>gestion pièce contrat</legend>
            <p>
              <select name="gestionnairepc">
              	<option value="del_p">suppression</option>
              	<option value="add_p">ajout</option>
              	<option  value="edit_p">Modification</option>
              </select>
              pièce à fournir : <input type="text" name="entrée1" id="entrée1" placeholder="pièce contrat" maxlength="19" required>
              compte à editer : <input type="text" name="cpc" id="cpt" placeholder="nom contrat" maxlength="19" required></br>
              edition : <input type="text" name="modif2" id="modif2" placeholder="modifier pièce contrat" maxlength="19">
            </p>
            <input type="submit" name="gestionpc" id="formsend">
          </fieldset>
        </form>
          <!-- statistique de la banque -->

            <form method="post" action="site.php">
              <fieldset>
            <legend>gestion capital et statistique</legend>
            <p>
              <select name="choix_statistique">
              	<option value="c_souscris">Nombre de contrat souscris </option>
              	<option value="nrb_rdv">Nombre de rdv</option>
              	<option value="total_cli">nombre total de client</option>
                <option value="solde_cli">solde des client</option>
              </select>
            date 1 : <input id="date" type="date" name="date" value="2021-12-14" required/>
            date 2 : <input id="date2" type="date" name="date2" value="2021-12-15"/>
            </p>
            <input type="submit" name="changement2compte" id="formsend"/>

          </fieldset>
          <form>


      <?php
        echo $contenu;
      ?>
      <form action="site.php" method='post'>
        <p><input type="submit" value="Disconnect" name="disconnect"/></p>
      </form>
  	</body>
 </html>
