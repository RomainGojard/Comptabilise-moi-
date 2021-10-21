<?php
try {
    session_start();
    $idtoselect = $_GET['id_to_select'];
    $nom_commercial = $_GET['nom_commercial'];
    $_SESSION["id_commercial"] = $idtoselect;
    $_SESSION["nom_commercial"] = $nom_commercial;
    header("Location: ../index_Comptable_gere.php");
}catch (Exception $e) {
    echo 'Exception reçue:', $e->getMessage(), "\n";
}
?>