<?php
require 'debut_html.inc.php'

?>

<body>
    
        <h1> Les maillots </h1>
        <p>Le résultat de votre recherche est :</p>

</body>
<hr />
<?php
    $maillot=$_GET['maillot'];

    require 'lib_crud.inc.php';
    $co=connexionBD();
    afficherResultatRecherche($co, $maillot);
    deconnexionBD($co);
?>
<?php

require 'fin_html.inc.php'?>