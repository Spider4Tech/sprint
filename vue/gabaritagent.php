<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Ma page</title>
      <meta charset="utf-8">
	    <link rel="stylesheet"  href="vue/style/style.css" />
    </head>
    <body>
      <div class="main">
        <form id="agentedit" action="site.php" method='post'>
          <fieldset>
            <!--recherche client -->
            <legend>Recherche client par nom</legend>
            <p>
              Nom : <input type="text" name="nomclient" maxlength="10" required/>
            </p>
            <p>
              prenom : <input type="text" name="prenomclient" maxlength="10" required/>
            </p>
            <p>
              Date de naissance : <input type="text" name="birthclient" maxlength="8" required/>
            </p>
            <p>
              <input type="submit" value="Edit" name="rechercheNomClient"/>
            </p>
          </fieldset>
        </form>
        <form id="agentsynth" action="site.php" method='post'>
          <fieldset>
            <!-- recherche client par id -->
            <legend>Recherche client par id</legend>
            <p>
              Id du client : <input type="number" name="idclient" required/>
              <input type="submit" value="Synthese" name="rechid"/>
              <input type="submit" value="Check compte" name="Checkcompte"/>
            </p>
          </fieldset>
        </form>
        <form action="site.php" method='post'>
          <fieldset>
            <legend>Prise de Rendez-vous</legend>
            <p>
              Date : <input type="date" name="date" required/>
            </p>
            <p>
              Debut : <input type="text" name="debut" required/>
            </p>
            <p>
              Fin : <input type="text" name="fin" required/>
            </p>
            <p>
              Id conseiller : <input type="text" name="id" required/>
            </p>
            <p>
              <input type="submit" value="Envoyer" name="placementhoraire"/>
            </p>
          </fieldset>
        </form>
        <?php
          echo $contenu;
        ?>
        <form action="site.php" method='post'>
          <p><input type="submit" value="Disconnect" name="disconnect"/></p>
        </form>
  	</body>
 </html>
