<?php

require 'debut_html.inc.php';
?>

<section>

    <?php
    
        require 'lib_crud.inc.php';
        $co=connexionBD();
        afficherCatalogue($co);
        deconnexionBD($co);

    ?>
</section>

<?php
require 'fin_html.inc.php'
?>