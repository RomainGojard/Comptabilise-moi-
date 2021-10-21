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
                    <a class="nav-link btn textnav" href="index_Comptable.php">Voir les commerciaux</a>
                </li>
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
                <div class="col-12">
                    <div class="d-flex justify-content-center pb-lg-3 pb-md-3 pb-sm-1">
                        <?php echo'<h2 class="text-center">Liste des frais de '.$_SESSION["nom_commercial"].'</h2>'?>
                    </div>
                </div>
            </div>
            <div class="row">
                 <div class="col-md-2 col-lg-2">
                 </div>
                 <div id="formContent" class="d-flex col-md-8 col-lg-8 col-sm-12 background-table my-table table-responsive gestion-desktop">
                    <table id="tblCustomer" class="mt-3 overflow-auto pt-4 pb-4" style="width: 100%;"><!-- overflow-->
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Type</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">État</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $pdo = new PDO('mysql:host=localhost;dbname=Comptabilise-moi;charset=utf8', 'root', 'root');
                        $data = $pdo->query("SELECT * FROM liste_frais INNER JOIN ETAT ON ETAT.ETAT_ID = `liste_frais`.ETAT_ID WHERE USER_ID = {$_SESSION["id_commercial"]}")->fetchAll();
       
                        foreach ($data as $value) {
                            echo "<tr><td>" . $value['frais_id'] . "</td><td>" . $value['frais_nom'] . "</td><td>" . $value['frais_date'] . "</td>
                        <form method='post' action='back/change_etat.php?id_to_select={$value["frais_id"]}'>

                        <td>
                            <select class='form-control' name='nouvel_etat' id='nouvel_etat'>
                                <option>Accepté</option>
                                <option>En attente</option>
                                <option>Refusé</option>
                            </select>
                        </td> 
                        <td>
                            <input type='submit' class='btn btn-primary' value='Modifier'>
                        </td>
                        </form>
                        <td>
                            <div class='justify-content-center '>";
                                if($value["etat_id"] == "1"){
                                    echo '<div class="alert alert-secondary" role="alert" >En attente</div>';
                                }
                                else if ($value["etat_id"] == "2"){
                                    echo '<div class="alert alert-success" style="background-color: #59B939BD; color: #FFFFFF"" role="alert">Accepté</div>';
                                }
                                else if ($value["etat_id"] == "3"){
                                    echo '<div class="alert alert-danger" style="background-color:#E22F2FD1; color: #FFFFFF" role="alert">Refusé</div>';
                                }
                            echo"</div>
                        </td>";
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