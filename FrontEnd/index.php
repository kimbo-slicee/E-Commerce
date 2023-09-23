<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>E-Commerce</title>
</head>
<body>
<?php
    include('./FrontNav.php');
    ?>
  
    <div class="container my-2">
    <i class="fa-solid fa-bars"></i>
<h1 cla>Liste Cegorie </h1>
<style>
  i{
    color:cornflowerblue;
    font-size: 2rem;

  }
  h1{
    font-family:cursive;
    color:cornflowerblue;
    text-transform: uppercase;
    display: inline;
  }
  ul a {
    text-decoration: none;
    color: cornflowerblue;
    font-family:cursive;
    text-transform: uppercase;
  }
</style>

<ul class="list-group w-25" >
<?php
    require_once('../Database.php');
    $sqlSate=$pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
    foreach($sqlSate as $Value){
        ?>
        <li class="list-group-item ">
          <i class="fa <?php echo $Value['Icon']?> my-2 mx-3"></i>
          <a href="categorie.php?id=<?php echo $Value['Id'] ?>"><?php echo $Value['libelle']?></a>
        </li>
      <?php
    }

    ?>
 
</ul>
</div>
</body>
</html>