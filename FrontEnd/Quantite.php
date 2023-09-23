 <?php
 session_start();
 $idutilisateur=$_SESSION['utilisateur']['id'];
 $Qnt=$_SESSION['panier'][$idutilisateur] ?? 0;
 $button=$Qnt == 0 ? 'Ajouter' : 'Modifier';
   ?>
   <form  method="POST" action="Ajouter_Panier.php" class="d-flex p-2 bd-highlight" >
    <div class="card-footer">
    <div class="counter">
    <input type="hidden" name="id" value="<?php echo $id_Poroduit?>">
    <button  onclick="return false" class="btn btn-primary" id="moin" >-</button>
    <input type="number" name="Qnt" id="Qnt" value="<?php echo $Value['Qnt'] ?>">
    <button onclick="return false" class="btn btn-primary" id="plus">+</button>
    <input type="submit" class="btn btn-danger my-2" name='Ajouter' value="<?php echo $button ?>" >
    </div>
    </div>
    </form>
    <?php


