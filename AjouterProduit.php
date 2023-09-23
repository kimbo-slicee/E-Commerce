
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
  require_once('Database.php');
  include('NavBar.php')

  ?>
  <h1>AjouterProduit</h1>
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
 <div class="container">
 <?php
    if(isset($_POST['Ajouter'])){
      $libelle=$_POST['Libelle'];
      $prix=$_POST['Prix'];
      $discount=$_POST['Discount'];
      $cate=$_POST['Cate'];
      $Description=$_POST['Discription'];
      if(isset($_FILES['image'])){
        $image=$_FILES['image']['name'];
        if(!empty($image)){
          $fileName=uniqid().$image;
          move_uploaded_file($_FILES['image']['tmp_name'],'./Assets/image/'.$fileName);
        }else{
          $fileName="alert.png";

        }
      

      }
    
      // die();

      // $Photo=$_POST['Photo'];
      if(!empty($libelle) && !empty($prix)){
        $sqlState=$pdo->prepare('INSERT INTO produit(libelle,Prix,Discount,Id_Categorie,Description,image) VALUES(?,?,?,?,?,?)');
        $inserted=$sqlState->execute([$libelle,$prix,$discount,$cate,$Description,$fileName]);
        if($inserted){
          header('location:AjouterProduit.php');
    
        }else{
          ?>
          <div class="container" id="close">
          <div class="alert alert-warning alert-dismissible fade show" role="alert" >
          <strong>Alert!</strong> DataBase ERORR(4400)
          <button type="button" id="btn" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="F1()"></button>
          </div>
          </div>
<?php
          
          
        };

      }else{
        ?> 
          <div class="container" id="close">
                     <div class="alert alert-warning alert-dismissible fade show" role="alert" >
                     <strong>Alert!</strong> les champs sont obligatoire.
                     <button type="button" id="btn" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="F1()"></button>
                     </div>
           </div>
        
        <?php
      }
     

   }
  ?>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Libellé</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Libelle" name="Libelle">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Prix</label>
        <input type="number" class="form-control" id="exampleInputPassword1" name="Prix" min='0'>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Discount</label>
        <input type='range' name="Discount" min='0' max="90">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Discription</label>
        <textarea class="form-control" name="Discription"></textarea>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>    
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Photo</label>
        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="Libelle" name="image">
         <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
      <?php
      $Categorie=$pdo->query('SELECT * FROM categorie ')->fetchAll(PDO::FETCH_ASSOC); 
      ?>
      <select name="Cate" class="form-control " >
        <option value="pardefault">Choisissez une categorie</option>
        <?php
        foreach($Categorie as $value){
          echo "<option value='".$value['Id']."'>".$value['libelle']."</option>";
        }
        ?> 
      </select>
        <input type="submit" value="Ajouter" class="btn btn-success" name="Ajouter"> 
    </div>
    </div>
  </form>
 </div>
<script src="main.js"></script>

</body>
</html>