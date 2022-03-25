<!DOCTYPE html>
<html>
	<head>
	    <title>SAE203</title>
        <link rel="stylesheet" href="../styles/style.css">
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="table2_gestion.php">Gestion</a>
	    <hr />
	    <h1>Ajouter un maillot </h1>
	    <hr />
        <?php
                require '../lib_crud2.inc.php';

                $id=$_GET['num'];
                $co=connexionBD();
                $joueur=getBD($co, $id);
                deconnexionBD($co);
            ?>
	    <form action="table2_update_valide.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="num" value="<?= $id; ?>" />
	        Prénom de joueur : <input type="text" name="prenom" value="<?php echo $joueur['joueur_prenom']; ?>" required /><br />
	        Nom du joueur : <input type="text" name="nom" value="<?php echo $joueur['joueur_nom']; ?>" required /><br />
	        Poste du joueur : <input type="text" name="poste" value="<?php echo $joueur['joueur_poste']; ?>" required /><br />
	        
	        <?php
	            $co=connexionBD();
                //afficherAuteursOptionsSelectionne($co, $maillot['_joueur_id']);
	            deconnexionBD($co);
	        ?>
			</select></br>
            
	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>