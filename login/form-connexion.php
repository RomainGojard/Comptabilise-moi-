<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=Comptabilise-moi;charset=utf8', 'root', 'root');
    $email = $_POST["email"];
    $password = $_POST["password"];
    $success = false;
    $data = $pdo -> query("SELECT * FROM `user` INNER JOIN FONCTION ON FONCTION.FONCTION_ID = `user`.FONCTION_ID")->fetchAll();

    foreach($data as $values) {
        if($values["email"] == $email && $values["password"] == $password){
            $success = true;
            session_start();
            $_SESSION["fonction"] = $values["fonction_type"];
            $_SESSION["user"] = $values["user_id"];
            $_SESSION["nom"] = $values["nom"];
            if ($values["fonction_type"] == "Commercial"){
                header("Location: ../index_Commercial.php");
            }
            else if ($values["fonction_type"] == "Admin"){
                header("Location: ../index_Admin.php");
            }
            else if ($values["fonction_type"] == "Comptable"){
                header("Location: ../index_Comptable.php");
            }
        }
    }

    if ($success == false ) {
        header("Location: loginerror.html");
    }
}catch (Exception $e) {
    echo 'Exception reçue:', $e->getMessage(), "\n";
}
?>
