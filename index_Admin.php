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
                    <a class="nav-link btn textnav"  data-toggle="modal" data-target="#ajoutFrais">Ajouter un utilisateur</a>
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

        <!-- Modal Ajout d'un user -->
        <div class="modal fade" id="ajoutFrais" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajout utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form method="post" action="back/new-user.php">
                                <h2>Entrer les informations du nouvel utilisateur:</h2>
                                <br>
                                <div class="wrap-input100 validate-input" data-validate = "Un nom valide est requis">
                                    <input class="input100" type="text" name="nom" placeholder="Nom" id="nom">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
							            <i class="fa fa-usert" aria-hidden="true"></i>
						            </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate = "Un email valide est requis: exemple@abc.xyz">
                                    <input class="input100" type="email" name="email" placeholder="Email" id="email">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
							            <i class="fa fa-envelope" aria-hidden="true"></i>
						            </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate = "Un mot de passe est requis">
                                    <input class="input100" type="password" name="password" placeholder="Mot de passe" id="password">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
							            <i class="fa fa-lock" aria-hidden="true"></i>
						            </span>
                                </div>
                                <h5>
                                    <label class="pt-4">Quelle est la fonction de l'utilisateur ?  </label>
                                    <select class="form-control" name="fonction" id="fonction">
                                        <option>Commercial</option>
                                        <option>Admin</option>
                                        <option>Comptable</option>
                                    </select>
                                </h5>
                                <div class="container-fermer-form-btn">
                                    <input class="btn fermer-form-btn" value="Fermer" data-dismiss="modal">
                                </div>
                                <div class="container-confirmer-form-btn">
                                    <input class="btn confirmer-form-btn" value="Confirmer" type="submit" name="submit" id="submitAjout">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--modal modifier un user-->
        <div class="modal fade" id="modifier_user" tabindex="-1" aria-labelledby="modifer_user" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modification utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form method="post" action="back/modifier-user.php">
                                <h3>Entrer les informations de l'utilisateur que vous voulez modifier:</h3>
                                <br>
                                <div class="wrap-input100 validate-input" data-validate ="Un nom valide est requis">
                                    <input class="input100" type="text" name="nom" placeholder="Nom" id="nom">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
							            <i class="fa fa-usert" aria-hidden="true"></i>
						            </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate = "Un email valide est requis: exemple@abc.xyz">
                                    <input class="input100" type="email" name="email" placeholder="Email" id="email">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
							            <i class="fa fa-envelope" aria-hidden="true"></i>
						            </span>
                                </div>
                                <h5>
                                    <label class="pt-4">Quelle est la fonction de l'utilisateur ?  </label>
                                    <select class="form-control" name="fonction" id="fonction">
                                        <option>Commercial</option>
                                        <option>Admin</option>
                                        <option>Comptable</option>
                                    </select>
                                </h5>
                                <div class="wrap-input100 validate-input" data-validate = "Un montant est requis" style="width: 40%">
                                    <input class="input100" type="number" name="user_id" placeholder=ID id="user_id">
                                    <span class="focus-input100"></span>
                                </div>
                                <div class="container-fermer-form-btn">
                                    <input class="btn fermer-form-btn" value="Fermer" data-dismiss="modal">
                                </div>
                                <div class="container-confirmer-form-btn">
                                    <input class="btn confirmer-form-btn" value="Confirmer" type="submit" name="submit" id="submitAjout">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container-fluid  gestion-sm">
            <div class="row justify-content-center pl-md-3 pr-md-3 gestion_desktop2">
                 <div class="">
                 </div>
                 <div id="formContent" class="d-flex col-md-12 col-lg-12 col-sm-12 background-table my-table table-responsive gestion-desktop-admin">
                    <table id="tblCustomer" class="mt-3 overflow-auto pt-4 pb-4" style="width: 100%;"><!-- overflow-->
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Fonction</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $pdo = new PDO('mysql:host=localhost;dbname=Comptabilise-moi;charset=utf8', 'root', 'root');
                        $data = $pdo->query("SELECT * FROM `user` INNER JOIN FONCTION ON FONCTION.FONCTION_ID = `user`.FONCTION_ID")->fetchAll();
                        foreach ($data as $value) {
                            echo "<tr><td>" . $value['user_id'] . "</td><td>" . $value['nom'] . "</td><td>" . $value['email'] . "</td><td>" . $value['fonction_type'] . "</td>
                        <td>
                            <div class='d-flex justify-content-center'>
                                <a data-toggle='modal' data-target='#modifier_user' class='btn btn-primary mr-2'>Modifier</a>
                                <a href='back/delete-user.php?id_to_delete=$value[user_id]' class='btn btn-danger'>Supprimer</a>
                            </div>
                        </td>
                        </tr>";
                        }
                        ?>

                        </tbody>
                    </table>
                 </div>
                 <div class="">
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