<?php


  // insertion des dépendances
  require 'secretxyz123.inc.php';





  // connexion à la base de données
  function connexionBD()
  {
    // on initialise la variable de connexion à null
    $mabd = null;
    try {
      // on essaie de se connecter
      // le port et le dbname ci-dessous sont À ADAPTER à vos données
      $mabd = new PDO('mysql:host=127.0.0.1;port=3306;
                dbname=sae203;charset=UTF8;', 
                UTIL, PASS);
      $mabd->query('SET NAMES utf8;');
    } catch (PDOException $e) {
      // s'il y a une erreur, on l'affiche
      echo '<p>Erreur : ' . $e->getMessage() . '</p>';
      die();
    }
    // on retourne la variable de connexion
    return $mabd;
  }
  





    // affichage du catalogue des albums
    function afficherCatalogue($mabd) {
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

            } else { 
                echo '<p>Pas de résultat !</p>'; 
            }
    }





      // gestion 
    function afficherListe($mabd) {
        $req = "SELECT * FROM maillot INNER JOIN joueur ON maillot._joueur_id = joueur.joueur_id";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        echo '<table>'."\n";
        echo '<thead><tr><th>Photo</th><th>Descriptif du maillot</th><th>Prix</th><th>Numéro</th><th>Année</th><th>Modifier</th><th>Supprimer</th></tr></thead>'."\n";
        echo '<tbody>'."\n";
        foreach ($resultat as $value) {
            echo '<tr>'."\n";
            echo '<td><img class="photo_moto" src="../images/'.$value['maillot_photo'].'" alt="image_'.$value['maillot_id'].'" /></td>'."\n";
            echo '<td>'.$value['maillot_equipe'].'</td>'."\n";
            echo '<td>'.$value['maillot_prix'].'</td>'."\n";
            echo '<td>'.$value['maillot_numero'].'</td>'."\n";
            echo '<td>'.$value['maillot_annee'].'</td>'."\n";
            echo '<td><a href="table1_update_form.php?num='.$value['maillot_id'].'">Modifier</a></td>'."\n";
            echo '<td><a href="table1_delete.php?num='.$value['maillot_id'].'">Supprimer</a></td>'."\n";
            echo '</tr>'."\n";
        }
        echo '</tbody>'."\n";
        echo '</table>'."\n";
    }



    // afficher les auteurs (prénom et nom) dans des champs "option"
    function afficherAuteursOptions($mabd) {
    	// on sélectionne tous les auteurs de la table auteurs
        $req = "SELECT * FROM maillot";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        // pour chaque auteur, on met son id, son prénom et son nom 
        // dans une balise <option>
        foreach ($resultat as $value) {
            echo '<option value="'.$value['maillot_id'].'">'; // id de l'auteur
            echo $value['maillot_joueur']; // prénom espace nom
            echo '</option>'."\n";
        }
    }



  // déconnexion de la base de données
  function deconnexionBD(&$mabd) {
    // on se déconnexte en mettant la variable de connexion à null 
    $mabd=null;
  }





      // fonction d'ajout d'une BD dans la table bande_dessinees
      function ajouterBD($mabd, $nom, $nouvelleImage, $annee, $prix, $numero, $equipe, $joueur)
      {
          $req = 'INSERT INTO maillot (maillot_joueur, maillot_photo, maillot_annee, maillot_prix, maillot_numero, maillot_equipe, _joueur_id) VALUES ("'.$nom.'", "'.$nouvelleImage.'","'.$annee.'", "'.$prix.'€", "'.$numero.'",  "'.$equipe.'", "'.$joueur.'")';
         
          try {
              $resultat = $mabd->query($req);
          } catch (PDOException $e) {
              // s'il y a une erreur, on l'affiche
              echo '<p>Erreur : ' . $e->getMessage() . '</p>';
              die();
          }
          if ($resultat->rowCount() == 1) {
              echo '<p>Le maillot  ' . $nom . ' a été ajoutée au catalogue.</p>' . "\n";
          } else {
              echo '<p>Erreur lors de l\'ajout.</p>' . "\n";
              die();
          }
      }






      // fonction d'effacement d'une BD
    function effaceBD($mabd, $id) {
    $req = 'DELETE FROM maillot WHERE maillot_id ='.$id.'';
    //   echo '<p>'.$req.'</p>'."\n";
      try{
          $resultat = $mabd->query($req);
      } catch (PDOException $e) {
          // s'il y a une erreur, on l'affiche
          echo '<p>Erreur : ' . $e->getMessage() . '</p>';
          die();
      }
      if ($resultat->rowCount()==1) {
          echo '<p>Le maillot '.$id.' a été supprimée du catalogue.</p>'."\n";
      } else {
          echo '<p>Erreur lors de la suppression.</p>'."\n";
          die();
      }
  }






  // fonction de récupération des informations d'une BD
  function getBD($mabd, $id) {
    $req = 'SELECT * FROM maillot WHERE maillot_id='.$id;
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    // la fonction retourne le tableau associatif 
    // contenant les champs et leurs valeurs
    return $resultat->fetch();
}



	// afficher le "bon" auteur parmi les auteurs (prénom et nom)
   // dans les balises "<option>"
	function afficherAuteursOptionsSelectionne($mabd, $joueurId) {
        $req = "SELECT * FROM joueur";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        foreach ($resultat as $value) {
            echo '<option value="'.$value['joueur_id'].'"';
            if ($value['joueur_id']==$joueurId) {
                echo ' selected="selected"';
            }
            echo '>';
            echo $value['joueur_prenom'].' '.$value['joueur_nom'];
            echo '</option>'."\n";
        }
      }






      function modifierBD($mabd, $nom, $annee, $numero, $prix, $equipe, $joueur, $nouvelleImage, $id)
    {   
        
        $req = 'UPDATE maillot SET maillot_joueur = "'.$nom.'", maillot_annee = "'.$annee.'", maillot_numero = "'.$numero.'", maillot_prix = "'.$prix.'", maillot_equipe = "'.$equipe.'", maillot_photo = "'.$nouvelleImage.'", _joueur_id = '.$joueur.' WHERE maillot_id='.$id;
        

        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount() == 1) {
            echo '<p>Le maillot ' . $nom . ' a été modifiée.</p>' . "\n";
        } else {
            echo '<p>Erreur lors de la modification.</p>' . "\n";
            die();
        }
    }





// Génération de la liste des auteurs dans le formulaire de recherche
function genererDatalistAuteurs($mabd) {
    // on sélectionne le nom et prénom de tous les auteurs de la table auteurs
    $req = "SELECT maillot_joueur FROM maillot";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    // pour chaque auteur, on met son nom et prénom dans une balise <option>
    foreach ($resultat as $value) {
        echo '<option value="'.$value['maillot_joueur'].'">'; 
    } 
}



// affichage des resultats de recherche
function afficherResultatRecherche($mabd, $maillot) {
    $req = "SELECT * FROM maillot 
            INNER JOIN joueur
            ON maillot._joueur_id = joueur.joueur_id
            WHERE maillot_joueur LIKE '%".$maillot."%'";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    // ICI VOTRE CODE POUR AFFICHER LES ALBUMS FILTRES
    foreach ($resultat as $value) {
        echo' <article>
        <div class="article-image">
            <div>
                <img src="images/'.$value['maillot_photo'].'"/>
            </div>
        </div>
        <div class="article-infos">
            <h1>'.$value['maillot_joueur'].'</h1>
            <h3>- '.$value['joueur_poste'].'</h3>
            <h3>- '.$value['maillot_annee'].'</h3>
            <h3>- '.$value['maillot_prix'].'</h3>
            <h3>- '.$value['maillot_numero'].'</h3>
            <h3>- '.$value['maillot_equipe'].'</h3>
        </div>
    </article>';
    
}
}
    




    //echo '<p>'.$req.'</p>."\n";

//var_dump($_POST);

//var_dump($_FILES);
