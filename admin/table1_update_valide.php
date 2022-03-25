<!DOCTYPE html>
<html>
	<head>
		<title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="table1_gestion.php">Gestion</a>
	    <hr />
	    <h1>Ajouter un maillot</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
            
			$id=$_POST['num'];
			$nom=$_POST['nom'];
	        $annee=$_POST['annee'];
	        $numero=$_POST['numero'];
	        $prix=$_POST['prix'];
	        $equipe=$_POST['maillot_equipe'];
	        $joueur=$_POST['joueur'];
	
	        $imageType=$_FILES["photo"]["type"];
	        if ( ($imageType != "image/png") &&
	            ($imageType != "image/jpg") &&
	            ($imageType != "image/jpeg") ) {
	                echo '<p>Désolé, le type d\'image n\'est pas reconnu !';
	                echo 'Seuls les formats PNG et JPEG sont autorisés.</p>'."\n";
	                die();
	        }
	
	        $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["photo"]["name"];
	
	        if(is_uploaded_file($_FILES["photo"]["tmp_name"])) {
	            if(!move_uploaded_file($_FILES["photo"]["tmp_name"], 
	            "../images/uploads/".$nouvelleImage)) {
	                echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
	                die();
	            }
	        } else {
	            echo '<p>Problème : image non chargée...</p>'."\n";
	            die();
	        }
	
	        $co=connexionBD();
	        modifierBD($co, $nom, $annee, $numero, 
	        		$prix, $equipe, $joueur, $nouvelleImage, $id);
	        deconnexionBD($co);
	    ?>
	</body>
</html>