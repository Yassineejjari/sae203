<?php

require 'debut_html.inc.php';
require 'header_html.inc.php';

?>


<main>
<h1>Connexion</h1>
        <form action="response_recherche.php" method="post">
            <label for="email">e-mail : </label>
            <input type="text" name="email" id="email"><br />
            <label for="mdp">mot de passe : </label>
            <input type="text" name="mdp" id="mdp"><br />
            <input type="submit" value="Envoyer !">
        </form>
</main>


<?php

    require 'footer_html.inc.php';
    require 'fin_html.inc.php';

?>