<?php

require 'debut_html.inc.php';
?>

<section>

<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'sae203', 'Dbzparmesan30$');
$mabd->query('SET NAMES utf8;');

$req = "SELECT * FROM maillot INNER JOIN joueur ON maillot._joueur_id = joueur.joueur_id";
$resultat = $mabd->query($req);

$lignes_resultat = $resultat->rowCount();
            if ($lignes_resultat>0) { 

                $i=0;
                while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
                 
                    echo    '<article>
                                <div class="article-image">
                                    <div>
                                        <img src="images/'.$ligne['maillot_photo'].'"/>
                                    </div>
                                </div>
                                <div class="article-infos">
                                    <h1>'.$ligne['maillot_joueur'].'</h1>
                                    <h3>- '.$ligne['joueur_poste'].'</h3>
                                    <h3>- '.$ligne['maillot_annee'].'</h3>
                                    <h3>- '.$ligne['maillot_prix'].'</h3>
                                    <h3>- '.$ligne['maillot_numero'].'</h3>
                                    <h3>- '.$ligne['maillot_equipe'].'</h3>
                                </div>
                            </article>';
                }

            } else { echo '<p>Pas de résultat !</p>'; 
            }
            $mabd = null;

?>
</section>

<?php
require 'fin_html.inc.php'
?>