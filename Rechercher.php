
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" methode="GET">
    <div class="input-group mb-3 w-50">
<input type="text" name="search" placeholder="Rechercher un  employé"  class="form-control" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}   ?>">
<input type="submit" value="envoyer"  name="submit" class="btn btn-primary">
</div>
</form> 
<div class="card mt-4">
<table class="table table-bordered">
    <thead>
<tr>
    <th> matricule</th>
    <th> nom</th>
</tr>
</thead>
<tbody>
    
<?php
$localhost="localhost";
$user="root";
$password="";
$DA="pme";
$connet= mysqli_connect($localhost,$user,$password,$DA);
if(isset($_GET['search'])){

    $filtrevalues=$_GET['search'];
    $query="SELECT * FROM employe WHERE matricule LIKE `%$filtrevalues%` or nom LIKE `%$filtrevalues%`";
    $qeeer=mysqli_query($connet,$query);


    if(mysqli_num_rows($qeeer) > 0){
        while($res=mysqli_fetch_assoc($qeeer)){  
            ?>
     <tr><td><?= $res['matricule']?></td>
           <td><?= $res['nom']?></td> </tr>
     <?php
        }
   
    }else{
        ?>
        <tr><td>NO</td></tr>
        <?php
    }
}

?>
</tbody>
</table>
</div>
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>