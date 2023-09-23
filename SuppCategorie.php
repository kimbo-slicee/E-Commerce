<?php
require_once('Database.php');
$id=$_GET['id'];
$sqlState=$pdo->prepare('DELETE FROM categorie WHERE Id=?');
$supprime=$sqlState->execute([$id]);
if($supprime){
    header('location:Liste.php');
}else{
    echo 'Database d Erorr ';
}
?>