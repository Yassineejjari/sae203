<!DOCTYPE html>
<html>
	<head>
	    <title>SAE203</title>
        <link rel="stylesheet" href="../admin/styles/style.css">
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="table2_gestion.php">Gestion</a>
	    <hr />
	    <h1>Ajouter un joueur </h1>
	    <hr />
	    <form action="table2_new_valide.php" method="POST" enctype="multipart/form-data">
			Prénom du joueur : <input type="text" name="prenom" required /><br />
	        Nom du joueur : <input type="text" name="nom" required /><br />
	        Poste du joueur : <input type="text" name="poste" required /><br />
            
	        
	        <?php
	            require '../lib_crud2.inc.php';
	            $co=connexionBD();
	            //afficherAuteursOptions($co);
	            deconnexionBD($co);
	        ?>
			</select></br>
	        
            


	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>