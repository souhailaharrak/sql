<?php
require 'config/connexion.php';

$matricule=$_POST['matricule'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$datee=$_POST['date_naissance'];
$salair=$_POST['salair'];
$fonction=$_POST['fonction'];
$un_dèpartement=$_POST['departement'];
// $photo=$_POST['photo'];
//  preparation de la requete
$sqlt="INSERT INTO employe(matricule,nom, prenom, date_naissance, salair,fonction, departement) VALUES ('$matricule','$nom','$prenom','$datee','$salair','$fonction','$un_dèpartement')";
// execution de la requte
mysqli_query($connet,$sqlt);

header('location:index.php');
?>
