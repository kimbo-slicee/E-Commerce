<?php
$id=$_GET['id'];
require_once('Database.php');
$sqlState=$pdo->prepare('DELETE FROM produit WHERE id=?');
$sqlState->execute([$id]);
header('location:ListeProduite.php');
?>