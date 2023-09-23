
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
    </svg>
    <title>AjouterCategorie</title>
</head>
<body>
    <?php
    include('NavBar.php');
    if(isset($_POST['Ajouter'])){
           $libelle=$_POST['Libelle'];
           $Description=$_POST['Description'];
           $Icon=$_POST['Icon'];
         if(!empty($libelle) && !empty($Description)){
                require_once('Database.php');
                $sqlstate=$pdo->prepare('INSERT INTO categorie(libelle,description,Icon) VALUES(?,?,?)');
                $sqlstate->execute([$libelle,$Description,$Icon]);
                header('location:Liste.php');
           
     
         } else{
                 ?>
                 <!-- message  -->
                 <div class="container">
                     <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>Alert!</strong> You should check in on some of those fields below.
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                     </div>
                 <?php
             }
     
     
     }
    ?>
    <h1 class="container">AjouterCategorie</h1>
    <div class="container">
<form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Libellé</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Libelle" name="Libelle">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="Description">
    <label for="exampleInputPassword1" class="form-label">Icon</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="Icon">
  </div>
  <div class="mb-3 ">
  </div>
  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
  <input type="submit" value="Ajouter" type="button" class="btn btn-success" name="Ajouter"> 
  </div>
</form>
<?php

?>
</div>
</body>
</html>