<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Document</title>
</head>
<body>
<?php
    include('NavBar.php');
    ?>
    <div class="container">

    <h2>Liste Des<span>Categorie</span> </h2>
    <table class="container my-3" >
        <thead>
            <tr>
                <th>ID</th>
                <th>libelle</th>
                <th>description</th>
                <th>Date</th>
                <th>Icons</th>
                <th>Operation</th>

            </tr>
        </thead>
        <tbody>
                <?php
                 require_once('Database.php');
                 $sqlSate=$pdo->query('SELECT * FROM categorie ')->fetchAll(PDO::FETCH_ASSOC);
                 foreach($sqlSate as $value):
                    ?>
                    <tr>
                    <td><?php echo $value['Id']?></td>
                    <td><?php echo $value['libelle']?></td>
                    <td><?php echo $value['description']?></td>
                    <td><?php echo $value['Date_creation']?></td>
                    <td><i  class="fa <?php echo $value['Icon']?>"></i></td>
                    <td>
                   <a href="ModCategorie.php?id=<?php echo $value['Id']?>" class="operation">Modifier</a>
                   <a href="SuppCategorie.php?id=<?php echo $value['Id']?>" class="operation" onclick="return confirm('Voulez vous vraimnet supprime la Categoria <?php echo $value['libelle']?>')">Supprime</a>
                    </td>
                    </tr>
                    <?php
                 endforeach;
                ?>
        </tbody>
    </table>
    <a  href="AjouterCategorie.php" class="New-btn">New Categorie</a>

    <style>
        .operation{
            text-decoration: none;
            text-transform: capitalize;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            background-color: #04AA6D;
            padding: 5px;
            margin: 5px;
            border-radius: 10px;



        }
        .operation:hover{
            color: #fff;
        }
       
      th, td {
            border-bottom: 1px solid #ddd;
            padding: 15px;
            text-align: left;
            }
        th {
                background-color: #04AA6D;
                color: white;
            }
            .New-btn{
                text-decoration: none;
                background-color: #04AA6D;
                color: #fff;
                border-radius: 5px;
                padding:10px;
                cursor: pointer;
                text-transform: uppercase;
                margin: 5px;

            }
          

    </style>
    </div>
</body>
</html>