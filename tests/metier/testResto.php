<?php
use \modele\metier\Resto;
use \modele\metier\Utilisateur;
use modele\metier\TypeCuisine;
use modele\metier\Critique;
use modele\metier\Photo;

require_once '../../includes/autoload.inc.php';

$desTC = array();
$desTC[] = new TypeCuisine(3, "Bretonne");
$desTC[] = new TypeCuisine(9, "Fast-food");

$user = new Utilisateur(6, 'test@bts.sio', 'seSzpoUAQgIl', 'testeur SIO');
$desCritiques = array();
$desCritiques[] = new Critique(5, "Parfait", $user);
$desCritiques[] = new Critique(3, "Perfectible ...", $user);

$desPhotos = array();
$desPhotos[] = new Photo(6, "cidrerieDuFronton.jpg");
$desPhotos[] = new Photo(7, "bar_de_la-cidrerie.jpg");


$unResto = new Resto(4, "Cidrerie du fronton", "", "Place du Fronton", "64210", "Arbonne", 0, 0, "Bar, galettes, cidres", "Ouvert 24/24 et 7/7");
$unResto->setLesTypesCuisineProposes($desTC);
$unResto->setLesPhotos($desPhotos);
$unResto->setLesCritiques($desCritiques);

?>
<h2>Test unitaire de la classe Utilisateur</h2>
<?php
var_dump($unResto);

