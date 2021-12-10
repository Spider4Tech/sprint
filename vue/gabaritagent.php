<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Ma page</title>
      <meta charset="utf-8">
	    <link rel="stylesheet"  href="vue/Style/style.css" />
    </head>
    <body>
      <div class="main">
        <form id="agent" action="site.php" method='post'>
          <fieldset>
            <p>
              Id du client : <input type="text" name="idclient"/>
              <input type="submit" name="rechid"/>
            </p>
          </fieldset>
        </form>
        <?php
          echo $contenu;
        ?>
  	</body>
 </html>
