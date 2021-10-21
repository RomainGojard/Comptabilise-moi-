<?php

try {
    $idtodelete = $_GET['id_to_delete'];
    $pdo = new PDO('mysql:host=localhost;dbname=Comptabilise-moi;charset=utf8', 'root', 'root');
    $data = $pdo -> query("DELETE FROM `user` WHERE user_id = {$idtodelete}")->fetchAll();
    header("Location: ../index_Admin.php");
}catch (Exception $e) {
    echo 'Exception reçue:', $e->getMessage(), "\n";

}

?>