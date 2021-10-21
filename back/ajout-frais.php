<?php
session_start();
if (isset($_POST['submit'])) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=Comptabilise-moi;charset=utf8', 'root', 'root');
        $nom_frais = $_POST["nom_frais"];
        $montant = $_POST["montant"];
        $date = $_POST["date"];
        $user_id = $_SESSION["user"];

        $success = true;
        if ($montant <= 0 ){
            $success = false;
            echo "montant invalide";
        }

        if ($success == true) {
            $pdo = new PDO('mysql:host=localhost;dbname=Comptabilise-moi;charset=utf8', 'root', 'root');
            $sql = "INSERT INTO `liste_frais`(`frais_nom`, `frais_montant`, `frais_date`, user_id, etat_id) VALUES (:frais_nom, :frais_montant, :frais_date, :user_id, :etat_id)";
            $res = $pdo->prepare($sql);
            $exec = $res->execute(array(":frais_nom" => $nom_frais, ":frais_montant" => $montant, ":frais_date" => $date, ":user_id" => $user_id, ":etat_id"=>1));
            if ($exec) {
                echo '
                    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                    <!-- Bootstrap JS -->
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                    
                    <div class="d-flex justify-content-center pt-5">
                        <div class="alert alert-success" role="alert">
                            Frais ajouté
                        </div>
                        <a class="btn btn-primary" href="../index_Commercial.php" role="button">Retourner sur l\'application</a>
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

