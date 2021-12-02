<?php

$pdo = new PDO('mysql: host= localhost ; dbname=crud_db', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ??  null;
if (!$id) :
    header('location: index.php');
endif;



$statment = $pdo->prepare('DELETE FROM crud_tb WHERE id =:id');

$statment->bindValue(':id', $id);
$statment->execute();


header('location: index.php');
