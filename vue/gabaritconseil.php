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
          <input type="radio" name="selection" value="edt_conseiller"/>
          <input type="radio" name="selection" value="edt_jour"/>
        </form>
      </fieldset>


      <?php
        echo $contenu;
      ?>
  	</body>
 </html>
