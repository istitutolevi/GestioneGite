<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mostra Proposte</title>

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

        <li class="nav-item active">
            <a class="nav-link" href="mostra_proposte.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Mostra Proposte</span></a>
        </li>

        <li class="nav-item">
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

                <h5 class="d-flex align-items-center mt-5">Proposte</h5>

                <script>
                    function AlertIt() {
                        alert("coming soon")
                    }

                    function myFunction() {
                        var now = new Date();

                        var day = ("0" + now.getDate()).slice(-2);
                        var month = ("0" + (now.getMonth() + 1)).slice(-2);
                        var today = (day) + "-" + (month) + "-" + now.getFullYear();

                        document.getElementById("cur_data").value = today;
                        document.getElementById("cur1_data").value = today;
                    }

                </script>

                <?PHP
                $class = $_SESSION['n_classe'];
                $sql1 = "SELECT COUNT(id) AS conteggio FROM proposte";
                $results = mysqli_query($con, $sql1);
                $values = mysqli_fetch_assoc($results);
                $I = $values['conteggio'];
                $I = $I + 1;

                echo "<div class='table-responsive'>";
                echo "<table class='table table-light table-bordered table-hover table-striped'>";
                echo "<thead class='thead-dark'>";
                echo "<tr>";
                echo "<th scope='col'>";
                echo "Classe";
                echo "</th>";
                echo "<th scope='col'>";
                echo "Destinazione";
                echo "</th>";
                echo "<th scope='col'>";
                echo "Docenti accompagnatori";
                echo "</th>";
                echo "<th scope='col'>";
                echo "Docenti sostituti";
                echo "</th>";
                echo "<th scope='col'>";
                echo "Periodo data";
                echo "</th>";
                echo "<th scope='col'>";
                echo "Data C.d.C.";
                echo "</th>";
                echo "</tr>";
                echo "</thead>";
                for ($A = 1; $A < $I; $A++) {
                    $sql = "SELECT * FROM `proposte` WHERE `id` = '$A'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if (!empty($row)) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<th scope='row'>";
                        echo $row['classe_name'];
                        echo "</th>";
                        echo "<th scope='row'>";
                        echo $row['meta'];
                        echo "</th>";
                        echo "<th scope='row'>";
                        echo $row['docenti_acc'];
                        echo "</th>";
                        echo "<th scope='row'>";
                        echo $row['docenti_sost'];
                        echo "</th>";
                        echo "<th scope='row'>";
                        echo $row['periodo_data'];
                        echo "</th>";
                        echo "<th scope='row'>";
                        echo $row['data_cdc'];
                        echo "</th>";
                        echo "</tr>";
                        echo "</tbody>";
                        unset($row);
                    }
                    unset($row);
                }
                echo "</table>";
                echo "</div>";
                ?>

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
