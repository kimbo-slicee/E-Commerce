<?php
$id=$_GET['id'];
require_once('../Database.php');
$sqlstate=$pdo->prepare('SELECT * FROM categorie WHERE id=?');
$sqlstate->execute([$id]);
$data=$sqlstate->fetch(PDO::FETCH_ASSOC);
include('./FrontNav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title><?php echo $data['libelle']?></title>
</head>
<body>
<div class="container">
<h1><?php echo $data['libelle'] ?><i class="fa <?php echo $data['Icon']?>"></i></h1>
    <div class="row">
            <?php
                $produits=$pdo->prepare('SELECT * FROM produit WHERE Id_Categorie=?');
                $produits->execute([$id]);
                $pro=$produits->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <?php
                if(count($pro) > 0){
                    foreach($pro as $value){
                        $id_Poroduit=$value['id'];
                        ?>
                            <div class="card col-md-4 mx-0.5 my-2">
                                <img src="../Assets/image/<?php echo $value['image']?>" class="card-img-top" width="80px"  height="260px" alt="Tv">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $value['libelle']?></h5>
                                        <p class="card-text"><?php echo $value['Description']?></p>
                                        <a class="btn stretched-link" href="DetailProduit.php?id=<?php echo $value['id']?>">Afficher Détail</a>
                                        <p class="card-text"><?php echo $value['Prix']?> MAD</p>
                                        <p class="text-danger"><?php echo $value['Discount']?>%</p>
                                        <?php include('./Quantite.php') ?>                                        

                                    </div>
                            </div>

                        <?php

                }


                }else{
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Holle!</strong> There's NO Items Know
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                }
               
        ?>
    </div>
</div>
<script src="./counter.js"></script>

</body>
</html>