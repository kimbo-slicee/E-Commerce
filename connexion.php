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

    <title>Connexion</title>
</head>
<body>
    <?php
    include('NavBar.php');
      if(isset($_POST['connexion'])){
        $userName=$_POST['userName'];
        $userpass=$_POST['password'];
        if(!empty($userName) && !empty($userpass)){
                require_once('./Database.php');
                $sqlSatet=$pdo->prepare('SELECT * FROM utilisateur WHERE userName=? AND password=?');
                 $sqlSatet->execute([$userName,$userpass]);   
                 if($sqlSatet->rowCount()>0){
                    session_start();
                    $_SESSION['utilisateur']=$sqlSatet->fetch();
                    header('location:admin.php');                  
                 }else{
                    ?>
                    <div class="container" id="close">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" >
                    <strong>Alert!</strong> <i><a class="text-decoration-non" href="index.php"> plase create un Account</a></i>
                    <button type="button" id="btn" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="F1()"></button>
                    </div>
                    </div>
                            <?php
                    

                 };
            }
            else{
                ?>
                <div class="container" id="close">
                <div class="alert alert-warning alert-dismissible fade show" role="alert" >
                <strong>Alert!</strong> <i>Chemps Obligatoire</i>
                <button type="button" id="btn" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="F1()"></button>
                </div>
                </div>
          <?php
                
        };

    };
    ?>
  
<div class="container">
    <form action="" method="POST">
        <label for="inputPassword5" class="form-label">UsreName</label>
        <input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="userName">
        <label for="inputPassword5" class="form-label">Password</label>
        <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="password">
        <div id="passwordHelpBlock" class="form-text"></div>
        <input type="submit" name="connexion" value="connexion" class="btn btn-primary btn-lg my-2">
    </form>
</div>
</body>
<script src="main.js"></script>
</html>