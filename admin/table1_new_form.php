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
	    <form action="table1_new_valide.php" method="POST" enctype="multipart/form-data">
			Nom du joueur : <input type="text" name="nom" required /><br />
	        Année : <input type="text" name="annee" required /><br />
	        Numéro : <input type="text" name="numero" required /><br />
	        Prix : <input type="text" name="prix" required /><br />
	        maillot equipe: <textarea name="maillot_equipe" required></textarea><br />
	        Photo : <input type="file" name="photo" required /><br />
	        <!-- Joueur : <select name="joueur" required> -->
			Joueur : <select name="joueur" required>
	        <?php
	            require '../lib_crud.inc.php';
	            $co=connexionBD();
	            afficherAuteursOptions($co);
	            deconnexionBD($co);
	        ?>
			</select></br>
	        
            


	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>