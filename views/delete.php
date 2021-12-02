<?php

$pdo = new PDO('mysql: host= localhost ; dbname=crud_db', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ??  null;

$statment = $pdo->prepare('DELETE FROM crud_tb WHERE id VALUE (:id)');

$statment->bindValue(':id', $id);
$statment->execute();
