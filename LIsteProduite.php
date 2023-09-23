<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ListeProruits</title>
</head>
<body>
<?php
include('NavBar.php');
require_once('Database.php');
$sqlSate=$pdo->query("SELECT * FROM  produit ")->fetchAll(PDO::FETCH_ASSOC);
?>
<table class="container my-5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Libelle</th>
            <th>Prix</th>
            <th>Discount</th>
            <th>Date</th>
            <th>Image</th>
            <th>Operation</th>

        </tr>
    </thead>
       <?php
       foreach($sqlSate as $value):
        ?>
        <tbody>
            <tr>
                <td><?php echo $value['id']?></td>
                <td><?php echo $value['libelle']?></td>
                <td><?php echo $value['Prix']?></td>
                <td><?php echo $value['Discount'].'%'?></td>
                <td><?php echo $value['Date_creation']?></td>
                <td><img width="25px" src="./Assets/image/<?php echo $value['image']?>"></td>

                <td>
                    <a href="SuppProduit.php?id=<?php echo $value['id'] ?>" class="operation">Supprime</a>
                    <a href="ModProduit.php?id=<?php echo $value['id']?>" class="operation">Modifier</a>

                </td>

            </tr>
        </tbody>
        <?php
       endforeach;
       ?>
</table>
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
  
        h2{
            font-family: 'Times New Roman', Times, serif;
            font-size: 2rem;
            text-align: center;
            color: #04AA6D;
            font-weight:bold ;
            font-style: italic;
            text-transform: uppercase;
            margin-top: 10px;
            text-decoration: underline;
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
</body>
</html>