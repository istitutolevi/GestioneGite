<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Benvenuto</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="css/stile.css">
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
    <script src="conn_serv.php"></script>
    <script src="vendor/jquery/jquery.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <?php
    include ('session_admin.php');
    include ('admin/script.php3');
    $utente = $_SESSION['n_classe'];
    ?>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <?php
            echo"<h6>Benvenuto, $utente!</h6>"
            ?>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="admin_home.php">
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
            <a class="nav-link" href="admin/stampa_proposte.php">
                <i class="fas fa-fw fa-print"></i>
                <span>Stampa Proposte</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="admin/mostra_proposte.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Mostra Proposte</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="admin/gestisci_proposte.php">
                <i class="fas fa-fw fa-archive"></i>
                <span>Gestisci Proposte</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="admin/stampa_proposte_alle_famiglie.php">
                <i class="fas fa-fw fa-print"></i>
                <span>Stampa Proposte alle famiglie</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="admin/elimina_proposte.php">
                <i class="fas fa-fw fa-trash"></i>
                <span>Reset Database</span></a>
        </li>

        </br>

        <hr class="sidebar-divider d-none d-md-block">

        <div class="sidebar-heading">
            Utenti
        </div>

        <li class="nav-item">
            <a class="nav-link" href="admin/gestione_account.php">
                <i class="fas fa-fw fa-user"></i>
                <span>Gestisci Utenti</span></a>
        </li>


        <li class="nav-item active">
            <a class="nav-link" href="sign_in.php">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Inserimento Classe</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="Log_out.php">
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
                        <form id="sign-in" class="w-100" action="registration.php" method="POST">
                            <div class="form-group">
                                <h1 class="text-center">Inserisci Classe</h1>
                                <input type="text" class="form-control" name="Classe" placeholder="Classe*" tabindex="1" required>
                                <br>
                                <input type="text" name="Email" class="form-control" placeholder="Email*" tabindex="2" required>
                                <br>
                                <input type="text" name="N_stud" class="form-control" placeholder="Numero studenti della classe*" tabindex="3" required>
                                <br>
                                <select name="indirizzo" class="form-control">
                                    <option value="ITT">	ITT		</option>
                                    <option value="IPSC">	IPSC	</option>
                                    <option value="LSSA">	LSSA	</option>
                                    <option value="IPIA">	IPIA	</option>
                                </select>
                                <br>
                                <input type="password" name="Password" class="form-control" placeholder="Password*" tabindex="4" required>
                                <br>
                                <input type="password" name="RPassword" class="form-control" placeholder="Ripeti password*" tabindex="5" required>
                                <br>
                                <p class="text-danger">*=campi obbligatori</p>
                                <br>
                                <input type="submit" class="btn btn-outline-dark btn-lg btn-block mb-1" value="Registrati">
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
