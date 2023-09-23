<?php
session_start();
if(!isset($_SESSION['utilisateur'])){
    header('location:../connexion.php');

}
$id=$_POST['id'];
$Qnt=$_POST['Qnt'];
$Id_Utilisateur=$_SESSION['utilisateur']['id'];
if(!empty($id) && !empty($Qnt)){
    if(!isset($_SESSION['panier'][$Id_Utilisateur])){
        $_SESSION['panier'][$Id_Utilisateur]=[];
    }
    $_SESSION["panier"][$Id_Utilisateur][$id]=$Qnt;
    echo'<pre>';
    print_r($_SESSION['panier']);
    echo '</pre>';
}else{
    header("location:produit.php?id=$id");
}
?>
