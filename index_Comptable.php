<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <link href="css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Comptabilise moi !</title>
</head>
<body>

<div class="limiter">


    <nav class="navbar navbar-expand-lg navbar-dark ma-navbar navbar_grey py-lg-5 py-md-3 py-sm-3">
        <a class="navbar-brand navbar-nav btn titre-nav" style="color: #7800E0; font-size: 40px;" href="#">Comptabilise-moi !</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link btn textnav pr-lg-5" href="back/destroy.php">Déconnexion</a>
                </li>
            </ul>
            <?php echo '<div><h5 class="nom-user" style="color: #aa2ee6;">'.$_SESSION["nom"].'</h5>
                        <h6 class="fonction-user" style="color: #aa2ee6;">'.$_SESSION["fonction"].'</h6></div>' ?>
        </div>
    </nav>

    <div class="container-login100">



        <div class="container-fluid  gestion-sm">
            <div class="row">
                 <div class="col-md-2 col-lg-2">
                 </div>
                 <div id="formContent" class="d-flex col-md-8 col-lg-8 col-sm-12 background-table my-table table-responsive gestion-desktop">
                    <table id="tblCustomer" class="mt-3 overflow-auto pt-4 pb-4" style="width: 100%;"><!-- overflow-->
                        <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Mail</th>
                            <th scope="col">Fonction</th>
                            <th scope="col">Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $pdo = new PDO('mysql:host=localhost;dbname=Comptabilise-moi;charset=utf8', 'root', 'root');
                        $data = $pdo->query("SELECT * FROM `user` WHERE fonction_id = 1")->fetchAll();
                        foreach ($data as $value) {
                            echo "<tr><td>" . $value['nom'] . "</td><td>" . $value['email'] . "</td><td>Commercial</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <a href='back/comptable-action.php?id_to_select=$value[user_id]&amp;nom_commercial=$value[nom]' class='btn btn-info'>Voir</a>
                            </div>
                        </td>
                        </tr>";
                        }
                        ?>

                        </tbody>
                    </table>
                 </div>
                 <div class="col-md-2 col-lg-2">
                 </div>
             </div>
        </div>
    </div>
</div>




<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="js/tableau.js"></script>-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {

        $("#tblCustomer").DataTable();

    });
</script>

</body>
</html>