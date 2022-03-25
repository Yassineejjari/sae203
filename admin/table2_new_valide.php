<!DOCTYPE html>
<html>
	<head>
		<title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="table2_gestion.php">Gestion</a>
	    <hr />
	    <h1>Ajouter un maillot</h1>
	    <hr />
	    <?php
	        require '../lib_crud2.inc.php';
            
			$prenom=$_POST['prenom'];
	        $nom=$_POST['nom'];
	        $poste=$_POST['poste'];
            
	        
	
	        
	
	        
	
	        $co=connexionBD();
	        ajouterBD($co, $prenom, $nom, $poste);
	        deconnexionBD($co);
	    ?>
	</body>
</html>