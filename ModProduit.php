
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
    <title>AjouterProduit</title>
</head>
<body>
  <?php
  include('NavBar.php');
  $id=$_GET['id'];
  require_once('Database.php');
  $sqlstate=$pdo->prepare('SELECT * FROM produit WHERE id=? ');
  $sqlstate->execute([$id]);
  $data=$sqlstate->fetch(PDO::FETCH_ASSOC);
  ?>
  <h1>Modifier Produite</h1>
  <style>
         h1{
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
  </style>
 <div class="container" enctype="multipart/form-data">
  <form action="" method="POST">
    <div class="mb-3">
        <label class="form-label" >Libellé</label>
        <input type="text" class="form-control" name="Libelle"  value="<?php echo $data['libelle']?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Prix</label>
        <input type="number" class="form-control"  name="Prix" min='0' value="<?php echo $data['Prix']?>">
    </div>
    <div class="mb-3">
        <label  class="form-label">Discount</label>
        <input type='range' name="Discount" min='0' max="90" >
    </div>
    <div class="mb-3">
     <div class="mb-3">
        <label  class="form-label">Discription</label>
        <textarea class="form-control" name="Discription"><?php echo $data['Description']?></textarea>
    </div>
    <img class="img img-fluid" src="./Assets/image/<?php echo $data['image'] ?>" >
    <div class="mb-3">
        <label  class="form-label">Image</label>
        <input type='File' class="form-control" name="image">
    </div>
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
      <select name="Cate" class="form-control " value="<?php echo $data['Discount']?>">
        <option value="pardefault">Choisissez une categorie</option> 
        <?php
        $teste=$pdo->prepare('SELECT * FROM categorie');
        $teste->execute();
        $data=$teste->fetchAll(PDO::FETCH_ASSOC);
        // print_r($data);
        foreach($data as $value){
          ?>
          <option value="<?php echo $value['Id'] ?>"><?php echo $value['libelle'] ?></option>
          <?php
        }
        ?>
      </select>
        <input type="submit" value="Modifier" class="btn btn-success" name="Modifier">
    
    </div>
    </div>
  </form>
 </div>
 <?php
 if(isset($_POST['Modifier'])){
 $Libelle=$_POST['Libelle'];
 $Prix=$_POST['Prix'];
 $Discount=$_POST['Discount'];
 $categorie=$_POST['Cate'];

 $fileName='';
 if(!empty($_FILES['image'])){
  $image=$_FILES['image']['name'];
  $fileName=uniqid().$image;
  move_uploaded_file($_FILES['image']['tmp_name'],'./Assets/image/'.$fileName);
 }else{
  $fileName='alert.png';
 }
  if(!empty($Libelle) && !empty($Prix) && !empty($categorie)){
    $Insert=$pdo->prepare('UPDATE produit SET libelle=?, Prix=?,Discount=?,Id_Categorie=? Description=? image=? WHERE Id=?');
    $Insert->execute([$Libelle,$Prix,$Discount,$categorie ,$Description,$fileName,$id]);
    header('location:ListeProduite.php');

  }

 }

 ?>
 
<script src="main.js"></script>

</body>
</html>