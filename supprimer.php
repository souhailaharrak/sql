<?php
require 'config/connexion.php';


    $matricule=$_GET['delete'];
    $superim="DELETE FROM employe WHERE matricule=$matricule";


mysqli_query($connet,$superim);

header('location:index.php');
?>