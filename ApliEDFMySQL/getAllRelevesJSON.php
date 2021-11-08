<?php

try {
	$db="bddedf";
	$dbhost="localhost";
	$dbport=8889;
	$dbuser="root";
	$dbpasswd="root";
	 
	$connexion = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);
	$connexion->exec("SET CHARACTER SET utf8");
	 
	$reponse = $connexion->prepare("SELECT * FROM treleve");
	$reponse->execute();
	$datas = array();
	         
	while($res=$reponse->fetch(PDO::FETCH_ASSOC)) {
	    $datas['treleve'][]=$res;
	}

	echo json_encode($datas);
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}

?>
