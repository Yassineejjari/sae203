<!DOCTYPE html>
<html>
	<head>
	    <title>SAE203</title>
        <link rel="stylesheet" href="../admin/styles/style.css">
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="table1_gestion.php">Gestion</a>
	    <hr />
	    <h1>Ajouter un maillot </h1>
	    <hr />
        <?php
                require '../lib_crud.inc.php';

                $id=$_GET['num'];
                $co=connexionBD();
                $maillot=getBD($co, $id);
                deconnexionBD($co);
            ?>
	    <form action="table1_update_valide.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="num" value="<?= $id; ?>" />
	        Nom du maillot : <input type="text" name="nom" value="<?php echo $maillot['maillot_joueur']; ?>" required /><br />
	        Année : <input type="text" name="annee" value="<?php echo $maillot['maillot_annee']; ?>" required /><br />
	        Numéro : <input type="text" name="numero" value="<?php echo $maillot['maillot_numero']; ?>" required /><br />
	        Prix : <input type="text" name="prix" value="<?php echo $maillot['maillot_prix']; ?>" required /><br />
	        maillot equipe: <textarea name="maillot_equipe" value="<?php echo $maillot['maillot_equipe']; ?>" required></textarea><br />
	        Photo : <input type="file" name="photo" value="<?php echo $maillot['maillot_photo']; ?>"required /><br />
			Joueur : <select name="joueur" required>
	        <?php
	            $co=connexionBD();
                afficherAuteursOptionsSelectionne($co, $maillot['_joueur_id']);
	            deconnexionBD($co);
	        ?>
			</select></br>
            
	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>