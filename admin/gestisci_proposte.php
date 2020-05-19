<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestisci Proposte</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="../css/stile.css">
    <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">
    <script src="../conn_serv.php"></script>
    <script src="../vendor/jquery/jquery.slim.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <?php
    include ('../session_admin.php');
    include ('script.php3');
    $utente = $_SESSION['n_classe'];
    ?>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <?php
            echo"<h6>Benvenuto, $utente!</h6>"
            ?>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="../admin_home.php">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Proposte
        </div>

        <li class="nav-item">
            <a class="nav-link" href="stampa_proposte.php">
                <i class="fas fa-fw fa-print"></i>
                <span>Stampa Proposte</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="mostra_proposte.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Mostra Proposte</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="gestisci_proposte.php">
                <i class="fas fa-fw fa-archive"></i>
                <span>Gestisci Proposte</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="stampa_proposte_alle_famiglie.php">
                <i class="fas fa-fw fa-print"></i>
                <span>Stampa Proposte alle famiglie</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="elimina_proposte.php">
                <i class="fas fa-fw fa-trash"></i>
                <span>Reset Database</span></a>
        </li>

        </br>

        <hr class="sidebar-divider d-none d-md-block">

        <div class="sidebar-heading">
            Utenti
        </div>

        <li class="nav-item">
            <a class="nav-link" href="gestione_account.php">
                <i class="fas fa-fw fa-user"></i>
                <span>Gestisci Utenti</span></a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="../sign_in.php">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Inserimento Classe</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="../Log_out.php">
                <i class="fas fa-fw fa-user-alt-slash"></i>
                <span>Log Out</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <section class="row justify-content-center">
                    <section class="col-12 col-sm-6 col-md-3">
                        <form class="form-container" action="exe_gestisci_proposte.php" method="POST">
                            <div class="form-group">
                                <h1 class="text-center">Seleziona proposte</h1>
                                <?php
                                $sql = "SET @count = 0";
                                mysqli_query($con,$sql);

                                $sql = "UPDATE `proposte` SET `proposte`.`id` = @count:= @count + 1";
                                mysqli_query($con,$sql);

                                $sql= "SELECT COUNT(*)AS total FROM proposte";
                                $results=mysqli_query($con,$sql);
                                $values=mysqli_fetch_assoc($results);
                                $I=$values['total'];
                                $I=$I+1;

                                echo"<br>";
                                echo"<label for='FormControlSelect1'>Meta, Docenti Accompagnatori, Data gita</label>";
                                echo"<select class='form-control' id='FormControlSelect1' name=\"selected\">";
                                $utente=$_SESSION['n_classe'];
                                for($A=0;$A<$I;$A++)
                                {

                                    $sqlquery = "SELECT * FROM proposte WHERE id='$A'";

                                    $result = mysqli_query($con, $sqlquery);
                                    $row	= mysqli_fetch_array($result, MYSQLI_ASSOC);

                                    ${'n1' . 'a'} = $row['meta'];
                                    ${'n2' . 'a'} = $row['docenti_acc'];
                                    ${'n3' . 'a'} = $row['periodo_data'];
                                    ${'n4' . 'a'} = $row['classe_name'];
                                    ${'n5' . 'a'} = $row['id'];

                                    if($n1a == $p && $n2a == $g and $n3a == $f && $n4a == $l && $n5a == $t)
                                    {
                                        unset($n1a);
                                        unset($n2a);
                                        unset($n3a);
                                        unset($n4a);
                                        unset($n5a);
                                    }
                                    else
                                    {

                                        if( !empty($n1a) && !empty($n2a) && !empty($n3a)   )
                                        {
                                            $try = addslashes($n2a);
                                            echo "<option     value='" . $n5a . ";" . $n4a .";". $n1a .";".$try.";".$n3a. "' >" . $n4a .";" . $n1a ."; ".$n2a."; " .$n3a. "</option>";
                                            $p = $n1a;
                                            $g = $n2a;
                                            $f = $n3a;
                                            $l = $n4a;
                                            $t = $n5a;
                                        }
                                    }

                                }
                                echo"</select>";
                                echo "<br>";
                                echo "<br>";
                                ?>
                                <div>
                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="radio" name="gender" id="Radios1" value="mod_proposta" checked>
                                        <label class="form-check-label" for="Radios1">
                                            Modifica la Proposta selezionata
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="gender" id="Radios2" value="del_proposta">
                                        <label class="form-check-label" for="Radios2">
                                            Elimina la proposta selezionata
                                        </label>
                                    </div>

                                    <!--<input type="radio" name="gender" value="mod_proposta"> Modifica la Proposta selezionata<br>
                                    <input type="radio" name="gender" value="del_proposta"> Elimina la proposta selezionata<br>
                                    <br>-->
                                    <input type="submit" class="btn btn-outline-dark btn-lg btn-block mb-1" role="button">
                                </div>
                            </div>
                        </form>
                    </section>
                </section>

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
