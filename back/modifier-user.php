<?php
try {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $user_id = $_POST["user_id"];
    $fonction = $_POST["fonction"];

    if ($fonction == "Commercial"){
        $fonction = 1;
    }
    else if ($fonction =="Admin"){
        $fonction = 2;
    }
    else if ($fonction =="Comptable"){
        $fonction = 3;
    }

    $pdo = new PDO('mysql:host=localhost;dbname=Comptabilise-moi;charset=utf8', 'root', 'root');
    $data = $pdo -> query("UPDATE `user` SET `email` = {$email}, `nom` = {$nom}, `fonction_id` = {$fonction} WHERE user_id = {$user_id}")->fetchAll();
    echo '
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <div class="d-flex justify-content-center pt-5">
            <div class="alert alert-success" role="alert">
                Utilisateur modifié
            </div>
            <a class="btn btn-primary" href="../index_Admin.php" role="button">Retourner sur l\'application</a>
        </div>
        ';

} catch (Exception $e) {
    echo 'Exception reçue:', $e->getMessage(), "\n";
}
?>
