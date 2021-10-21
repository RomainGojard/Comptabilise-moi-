<?php
if(isset($_POST['submit'])) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=Comptabilise-moi;charset=utf8', 'root', 'root');
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $password = $_POST["password"];
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
        $success = true;
        $data = $pdo->query("SELECT * FROM `user`")->fetchAll();
        foreach ($data as $values) {
            if ($values["email"] == $email || $values["nom"] == $nom) {
                echo '
                    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                    <!-- Bootstrap JS -->
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                    
                    <div class="d-flex justify-content-center pt-5">
                    <div class="alert alert-danger" role="alert">
                        Nom ou email déjà utilisé
                    </div>
                    <a class="btn btn-primary" href="../index_Admin.php" role="button">Retourner sur l\'application</a>
                    </div>
                    ';
                $success = false;
            }
        }

        if ($success == true) {
            $pdo = new PDO('mysql:host=localhost;dbname=Comptabilise-moi;charset=utf8', 'root', 'root');
            $sql = "INSERT INTO `user`(`nom`, `email`, `password`, fonction_id) VALUES (:nom, :email, :password, :fonction_id)";
            $res = $pdo->prepare($sql);
            $exec = $res->execute(array(":nom" => $nom, ":email" => $email, ":password" => $password, ":fonction_id" => $fonction));
            if ($exec) {
                echo '
                    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                    <!-- Bootstrap JS -->
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                    
                    <div class="d-flex justify-content-center pt-5">
                        <div class="alert alert-success" role="alert">
                            Nouvel utilisateur ajouté
                        </div>
                        <a class="btn btn-primary" href="../index_Admin.php" role="button">Retourner sur l\'application</a>
                    </div>
                    ';
            } else {
                echo "Échec de l'opération d'insertion";
            }
        }
    } catch (Exception $e) {
        echo 'Exception reçue:', $e->getMessage(), "\n";
    }
}
?>
