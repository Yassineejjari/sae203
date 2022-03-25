<?php
    require 'debut_html.inc.php';
?>


<main>
<div id="search-box-bg">
                    <form id="form" method="get" action="reponse_recherche.php">
                        <div id="form-search">
                            <input type="maillot" list="maillot" name="maillot" id="real" autocomplete="off" placeholder="Qui cherchez-vous ?">
                            <datalist id="maillot_joueur">
                            <?php
    // On va afficher ici la datalist
    require 'lib_crud.inc.php';
    $co=connexionBD();
    genererDatalistAuteurs($co);
    deconnexionBD($co);
?>
</datalist>
<button type="submit" class="search-button"></button>
    </form>
</main>

<?php
    require 'fin_html.inc.php';
?>