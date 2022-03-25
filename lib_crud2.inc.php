<?php


  // insertion des dépendances
  require 'secretxyz123.inc.php';




  function deconnexionBD(&$mabd) {
    // on se déconnexte en mettant la variable de connexion à null 
    $mabd=null;
  }
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
  function afficherListe($mabd) {
    $req = "SELECT * FROM joueur ";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    echo '<table>'."\n";
    echo '<thead><tr><th>Prénom Joueur</th><th>Nom Joueur</th><th>Poste Joueur</th><th>Modifier</th><th>Supprimer</th></tr></thead>'."\n";
    echo '<tbody>'."\n";
    foreach ($resultat as $value) {
        echo '<tr>'."\n";
        
        
        echo '<td>'.$value['joueur_prenom'].'</td>'."\n";
        echo '<td>'.$value['joueur_nom'].'</td>'."\n";
        echo '<td>'.$value['joueur_poste'].'</td>'."\n";
        echo '<td><a href="table2_update_form.php?num='.$value['joueur_id'].'">Modifier</a></td>'."\n";
        echo '<td><a href="table2_delete.php?num='.$value['joueur_id'].'">Supprimer</a></td>'."\n";
        echo '</tr>'."\n";
    }
    echo '</tbody>'."\n";
    echo '</table>'."\n";
}
// fonction d'ajout d'une BD dans la table bande_dessinees
function ajouterBD($mabd, $prenom, $nom, $poste)
{
    $req = 'INSERT INTO joueur (joueur_prenom, joueur_nom, joueur_poste) VALUES ("'.$prenom.'", "'.$nom.'","'.$poste.'")';
   
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    if ($resultat->rowCount() == 1) {
        echo '<p>Le joueur  ' . $prenom . ' a été ajoutée au catalogue.</p>' . "\n";
    } else {
        echo '<p>Erreur lors de l\'ajout.</p>' . "\n";
        die();
    }
}
function getBD($mabd, $id) {
    $req = 'SELECT * FROM joueur WHERE joueur_id='.$id; 
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
function modifierBD($mabd, $id, $prenom, $nom, $poste)
    {   
        
        $req = 'UPDATE joueur SET joueur_prenom = "'.$prenom.'", joueur_nom = "'.$nom.'", joueur_poste = "'.$poste.'" WHERE joueur_id='.$id;
        

        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount() == 1) {
            echo '<p>Le joueur ' . $prenom . ' a été modifiée.</p>' . "\n";
        } else {
            echo '<p>Erreur lors de la modification.</p>' . "\n";
            die();
        }
    }
    // fonction d'effacement d'une BD
    function effaceBD($mabd, $id) {
        $req = 'DELETE FROM joueur WHERE joueur_id ='.$id.'';
        //   echo '<p>'.$req.'</p>'."\n";
          try{
              $resultat = $mabd->query($req);
          } catch (PDOException $e) {
              // s'il y a une erreur, on l'affiche
              echo '<p>Erreur : ' . $e->getMessage() . '</p>';
              die();
          }
          if ($resultat->rowCount()==1) {
              echo '<p>Le joueur '.$id.' a été supprimée du catalogue.</p>'."\n";
          } else {
              echo '<p>Erreur lors de la suppression.</p>'."\n";
              die();
          }
      }


