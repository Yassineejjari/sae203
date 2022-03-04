<?php
$prenomFiltre=filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
echo '<p>Prenom nettoyé  : '.$prenomFiltre.'</p>'."\n" ;
echo '<p>Votre E-mail est  : '."\n" ;
echo htmlentities($prenomFiltre, ENT_QUOTES,"UTF-8").'</p>'."\n" ;
$ageFiltre=filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);
if ($agePropre=filter_var($ageFiltre, FILTER_VALIDATE_INT)) {
    echo'<p>Votre age : '.htmlentities($agePropre, ENT_QUOTES, "UTF-8").'</p>'."\n"; 
}

    if ( (empty($_POST['prenom'])) || (empty($_POST['age'])) ) {
        header('Location: form1.php');
    }

    //echo '<p>Votre prénom : '.$_POST['prenom'].'</p>'."\n";
    //echo '<p>Votre âge : '.$_POST['age'].'</p>'."\n";