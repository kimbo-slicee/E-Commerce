<?php
session_start();
$connecte=false;
if(isset($_SESSION['utilisateur'])){
$connecte=true;
}
?>
<nav class="navbar navbar-expand-lg navbar-light " style="background-color:#04AA6D;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php
      if($connecte){
        ?>
        <li class="nav-item">
          <a  class="nav-link active" aria-current="page" href="Liste.php">Liste Categorie</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link active" aria-current="page" href="ListeProduite.php">Liste Produits</a>
        </li>
         <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Ajouter utilisateur</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="AjouterCategorie.php">Ajouter Categorie</a>
        </li>  <li class="nav-item">
          <a class="nav-link" aria-current="page" href="AjouterProduit.php">Ajouter poduit </a>
        </li>
        </li>  <li class="nav-item">
          <a class="nav-link" aria-current="page" href="Deconnexion.php">Déconnexion</a>
        </li>
        <?php
      }
      else{
        ?> 
         <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Ajouter utilisateur</a>
      </li>
          <li class="nav-item">
            <a class="nav-link" href="connexion.php">Connexion</a>
          </li>
        <?php
      }
      ?>
       
      
      </ul>
      
    </div>
  </div>
</nav>
    
