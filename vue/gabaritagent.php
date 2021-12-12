<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Ma page</title>
      <meta charset="utf-8">
<<<<<<< HEAD
	    <link rel="stylesheet"  href="vue/style/style.css" />
=======
	    <link rel="stylesheet"  href="vue/style/style2.css" />
>>>>>>> 82820c7fc5c85d4d1b27872239494405bc35d888
    </head>
    <body>
      <div class="main">
        <form id="agentedit" action="site.php" method='post'>
          <fieldset>
            <p>
              Nom : <input type="text" name="nomclient" required/>
            </p>
            <p>
              prenom : <input type="text" name="prenomclient"required/>
            </p>
            <p>
              Date de naissance : <input type="text" name="birthclient"required/>
            </p>
            <p>
              <input type="submit" value="Edit" name="rechercheNomClient"/>
            </p>
          </fieldset>
        </form>
        <form id="agentsynth" action="site.php" method='post'>
          <fieldset>
            <p>
              Id du client : <input type="text" name="idclient" required/>
              <input type="submit" value="Synthese" name="rechid"/>
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
