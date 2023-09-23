<?php
$id=$_GET['id'];
require_once("../Database.php");
$connect=$pdo->prepare('SELECT * FROM produit WHERE id=? ');
$connect->execute([$id]);
$Data=$connect->fetch(PDO::FETCH_ASSOC);
$id_Poroduit=$Data['id'];
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Stylesheet/Prodacts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?php echo $Data['libelle']?></title>
</head>
<body>
    <?php
    include('./FrontNav.php');
    $discounte=$Data['Discount'];
    $prix=$Data['Prix'];

    ?>
    <div class="conatiner py-2">
        <h4><?php echo $Data['libelle']?></h4>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid w-50" src="../Assets/image/<?php echo $Data['image']?>">
                </div>
                <div class="col-md-6">
                    <h1><?php echo $Data['libelle']?></h1>
                    <hr>
                    <p><?php echo $Data['Description']?></p>
                    <?php
                    if($discounte>0){
                        $total=$prix-(($prix*$discounte)/100);
                        ?>
                        <h2><?php echo $total?>MAD</h2>
                        <span class="badge rounded-pill bg-success text-dark"><?php echo $discounte?>%</span>
                        <p><del style="color:#FF0000;" ><?php echo $prix?>MAD</del></p>
                       
                        <?php
                    }
                    else{
                            ?>
                            <p><?php echo $prix?>MAD</p>
                            <p>pas dicounter </p>
                            <?php                        

                    }
                    ?>
                <a class="btn btn-primary" href="">Ajuter</a>
                </div>
                <?php include('./Quantite.php') ?>
              

<script src="./counter.js"></script>
        
   
    
</body>
</html>