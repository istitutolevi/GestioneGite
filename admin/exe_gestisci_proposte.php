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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link rel="stylesheet" href="../css/stile.css">
    <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">
    <script src="../conn_serv.php"></script>
    <script src="../vendor/jquery/jquery.slim.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <?php
    include('../session_admin.php');
    include('script.php3');
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
            echo "<h6>Benvenuto, $utente!</h6>"
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
                <span>Elimina Proposte</span></a>
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
            <a class="nav-link" href="reset_password.php">
                <i class="fas fa-fw fa-reply"></i>
                <span>Reset Password</span></a>
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

                <section class="row justify-content-center"
                ">
                <section class="col-12 col-sm-6 col-md-3">

                    <?PHP
                    $class = $_SESSION['n_classe'];
                    $action = $_POST['gender'];

                    if ($action == "mod_proposta") {
                        $selected = $_POST['selected'];
                        $array = explode(';', $selected);

                        $sql = "SELECT * FROM `proposte` WHERE `id` = '$array[0]' AND `classe_name` = '$array[1]' ";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        $meta = $row['meta'];
                        $doc_acc = $row['docenti_acc'];
                        $doc_sost = $row['docenti_sost'];
                        $obb = $row['obbiettivi'];
                        $data = $row['periodo_data'];
                        $data_cdc = $row['data_cdc'];
                        $id = $row['id'];


                        echo "<form id=\"exe_gestisci_proposte\" action=\"update_prop.php\" method=\"POST\">";
                        echo "<div class=\"form-group\">";
                        echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
                        echo "<input type=\"hidden\" name=\"class\" value=\"$array[0]\">";
                        echo "<input class=\"form-control\" type=\"text\" name=\"destinazione\" placeholder=\"destinazione\" value=\"$meta\">";
                        echo "<br>";
                        echo "<br>";
                        echo "<input class=\"form-control\" type=\"text\" name=\"doc_acc\" placeholder=\"Inserisci i docenti accompagnatori separandoli con una virgola\" value=\"$doc_acc\">";
                        echo "<br>";
                        echo "<br>";
                        echo "<input class=\"form-control\" type=\"text\" name=\"doc_sost\"  placeholder=\"Inserisci i docenti sostituti separandoli con una virgola\" value=\"$doc_sost\">";
                        echo "<br>";
                        echo "<br>";
                        echo "<textarea class=\"form-control\" name=\"Obiettivi1\" placeholder=\"Obiettivi didattici\">$obb</textarea>";
                        echo "<br>";
                        echo "<br>";
                        echo "<input class=\"form-control\" type=\"text\" name=\"per_data\"  placeholder=\"Periodo Data\" value=\"$data\">";
                        echo "<br>";
                        echo "<br>";
                        echo "<input class=\"form-control\" type=\"text\" name=\"data_cdc\"  placeholder=\"Data odierna Consiglio di Classe\" value=\"$data_cdc\">";
                        echo "<br>";
                        echo "<br>";
                        echo "<input class=\"form-control button buttonh button1\" type=\"submit\" value=\"Invia\">";
                        echo "<br>";
                        echo "<br>";
                        echo "<a class=\"text-danger\">*Per inserire nuove proposte inviare e ritornare su proposte</a>";
                        echo "</div>";
                        echo "</form>";
                    } else
                        if ($action == "del_proposta") {
                            $selected = $_POST['selected'];
                            echo $selected;
                            $array = explode(';', $selected);
                            $sql = "DELETE FROM `proposte` WHERE `id` = '$array[0]' AND `classe_name` = '$array[1]'";
                            $result = mysqli_query($con, $sql);
                            header("Location: ../admin_home.php");
                        }
                    ?>
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
