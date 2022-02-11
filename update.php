<?php
require 'config/connexion.php';
$rn = $_GET['matricule']; // hadi hiya value dyal matricule li f url
$mod = mysqli_query($connet, "SELECT * FROM employe WHERE matricule=$rn");
$result = mysqli_fetch_assoc($mod);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $target_dir = "images/";   //chemin lighadi tmchi photo
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["photo"])) {  //   نوع الحجم معرفة ابعاد الصورة //
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

   echo "post";
    // exit;
    $matricule = $_POST['matricule'];  
    $nom = $_POST['nom']; 
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $salair = $_POST['salair'];
    $fonction = $_POST['fonction'];
    $departement = $_POST['departement'];
	$photo = $target_file;

    $query = "UPDATE `employe` SET `nom`='".$nom."',`prenom`='".$prenom."',`date_naissance`='".$date_naissance."',`salair`='".$salair."',`fonction`='".$fonction."',`departement`='".$departement."',`image`='".$photo."' WHERE matricule='".$rn."' "; 
	mysqli_query($connet,$query);
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       #btv{  color:white;
        height: 32px;
        width:125px;
     border-radius:5px;
           background-color:green;
           border:0px;
       }
    table{color:white;
        border-radius:20px;
        margin-bottom:50px
    }
html{
    width: 100%;
    height:10vh;
    color:#fff;
    background:linear-gradient(-45deg,#EE7752,#E73C7E,#23A6D5,#23D5AB);
    background-size:400%,400%;
    position:relative;
    animation:change 10s ease-in-out infinite;
}
.back{
    list-style: none;
     text-decoration: none;
     font-size:5rem;
     text-transform:uppercase;
     position:absolute;
     top:50%;
     left:50%;
     transform:translate(-50%,-50%);
    
}
@keyframes change{ 0%{
      background-position:0 50%;
}
    50%{  background-position:100% 50%;

    }
    100%{
        background-position:0 50%;
    }
}


    </style>
</head>
<body>
   <br><br><br><br><br><br><br>
   <form method="POST" action="" enctype="multipart/form-data">
  <table border="0" bgcolor="black" cellspacing="25"for>
 <tr>
     <td >matricule</td>
     <td><input type="text" value="<?php echo $result['matricule']?>" name="matricule" required></td>
 </tr>
 <tr>
     <td>nom</td>
     <td><input type="text" value="<?php echo $result['nom']?>" name="nom" required></td>
 </tr>
 <tr>
     <td>prenom</td>
     <td><input type="text" value="<?php echo $result['prenom']?>" name="prenom" required></td>
</tr>
 <tr>
     <td>date de naissance</td>
     <td><input type="date" value="<?php echo $result['date_naissance']?>" name="date_naissance" required></td>
</tr>
<tr>
     <td>salair</td>
     <td><input type="text" value="<?php echo $result['salair']?>" name="salair" required></td>
</tr>
<tr>
     <td>fonction</td>
     <td><input type="text" value="<?php echo $result['fonction']?>" name="fonction" required></td>
</tr>
<tr>
     <td>departement</td>
     <td><input type="text" value="<?php echo $result['departement']?>" name="departement" required></td>
</tr>
<tr>
     <td>photo</td>
     <td><input type="file" value="" name="photo"><p><strong>Note:</strong>only .jpg, .png, .jpeg</p> </td>
     
</tr>
<tr>
     <td colspan="2" align="centre"><input type="submit" name="submit"  value="Update" id="btv"></td>
 </tr>

 
   </table>
    </form>  
</body>
</html>