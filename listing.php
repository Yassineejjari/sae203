<?php

require 'debut_html.inc.php';
?>
<body>
<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'sae203', 'Dbzparmesan30$');

$mabd->query('SET NAMES utf8;');
$req = "SELECT * FROM maillot INNER JOIN joueur ON maillot._joueur_id = joueur.joueur_id";
$resultat = $mabd->query($req);
?>
</body>

<?php
require 'fin_html.inc.php'
?>