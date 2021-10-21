<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=Comptabilise-moi;charset=utf8', 'root', 'root');
    $nouvel_etat = $_POST["nouvel_etat"];
    $frais_id = $_GET["id_to_select"];


    if ($nouvel_etat == "Accepté"){
        $nouvel_etat = 2;
    }
    else if($nouvel_etat == "En attente"){
        $nouvel_etat = 1;
    }
    else if ($nouvel_etat == "Refusé"){
        $nouvel_etat = 3;
    }

    $data = $pdo -> query("UPDATE liste_frais SET `etat_id` = {$nouvel_etat} WHERE frais_id = {$frais_id}")->fetchAll();

    header("Location: ../index_Comptable_gere.php");

}catch (Exception $e) {
    echo 'Exception reçue:', $e->getMessage(), "\n";
}
?>
