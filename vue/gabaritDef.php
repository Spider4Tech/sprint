<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Ma page</title>
      <meta charset="utf-8">
	    <link rel="stylesheet"  href="vue/style/style.css" />
    </head>
  	<body>
      <div class="main">
        <form id="log" action="site.php" method='post'>
          <fieldset>
            <p>
              Login : <input type="text" name="login" maxlength="12" required/>
            </p>
            <p>
              Password : <input type="password" name="mdp" maxlength="16" required/>
            </p>
            <p>
              <input type="submit" value="Send" name="envoie">
            </p>
          </fieldset>
        </form>
      </div>
  	</body>
 </html>
