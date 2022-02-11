
<?php
//Connecter la base des données
require 'config/connexion.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
    <form method="get">
        <input name="search" type="text" placeholder="chercher">
    </form>
</div>


<form action="ajouter.php" method="post">
<input type="text" name="matricule" placeholder="matricule">
<input type="text" name="nom" placeholder="nom">
<input type="text" name="prenom" placeholder="prenom">
<input type="text" name="date_naissance" placeholder="date">
<input type="text" name="salair" placeholder="salair">
<input type="text" name="fonction" placeholder="fonction">
<input type="text" name="departement" placeholder="un département">
<button type="submit" class="btnn btn-dark" class="btNN" >ajoute</button>
</form>
<div class=" ms-25">
<table class="table ">
<tr>
<th >une matricule</th>
<th >un nom</th>
<th>un prénom</th>
<th>une date de naissance</th>
<th> un salaire</th>
<th>une fonction</th>
<th>un dèpartement</th>
<th  >action</th>
<!-- <th>un photo</th> -->
</tr>
<?php
if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql="SELECT * FROM employe WHERE matricule like '%$search%' OR nom like '%$search%'";
} else {
    $sql="SELECT * FROM employe";
}

$exc=mysqli_query($connet,$sql);
while($result=mysqli_fetch_assoc($exc)){
?>
<tr>
    <td><?php echo $result['matricule']?></td>
    <td><?php echo $result['nom']?></td>
    <td><?php echo $result['prenom']?></td>
    <td><?php echo $result['date_naissance']?></td>
    <td><?php echo $result['salair']?></td>
    <td><?php echo $result['fonction']?></td>
    <td><?php echo $result['departement']?></td>
    <td><a href="supprimer.php?delete=<?php echo $result['matricule']?>" class="btn btn-danger">supprimer</a>
    <a href="update.php?matricule=<?php echo $result['matricule']?>" class="btn btn-info">edit</a>
 
</td>

</tr>
<?php
}
?>

</table>
</div>
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<html>
