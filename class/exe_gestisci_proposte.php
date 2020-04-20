<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Benvenuto!</title>
    <link rel="stylesheet" href="../css/stile.css">
    <link rel="stylesheet" href="../bootstrap.min.css" type="text/css">
    <script src="../conn_serv.php"></script>
    <script src="../vendor/jquery/jquery.slim.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php
    include('../session_class.php');
    $utente = $_SESSION['n_classe'];
    ?>
    <title>
        Gestisci proposte
    </title>

</head>
<body class="bg" onload="myFunction()">
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <?php
            echo "<h1>Benvenuto, $utente!</h1>"
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse dropdown" id="navbarResponsive">
            <ul class="navbar-nav ml-5">
                <li class="nav-item">
                    <a class="nav-link" href="../class_home.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="proposte.php">MANDA PROPOSTA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="compila_modulo.php">COMPILA MODULO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stampa_modulo.php">STAMPA MODULO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestisci_utente.php">GESTISCI UTENTE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="gestisci_proposte.php">GESTISCI PROPOSTE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="compila_relazione.php">COMPILA RELAZIONE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contattaci.php">CONTATTACI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Log_out.php">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<script>

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
$action = $_POST['gender'];
if ($action == "mostra_proposte") {
    $sql1 = "SELECT COUNT(id) AS conteggio FROM proposte";
    $results = mysqli_query($con, $sql1);
    $values = mysqli_fetch_assoc($results);
    $I = $values['conteggio'];
    $I = $I + 1;

    echo "<div class='table-responsive'> 
                <table class='table table-light table-bordered table-hover table-striped'>
                    <thead class='thead-dark'> 
                        <tr> 
                            <th scope='col'>Classe</th> 
                            <th scope='col'>Destinazione</th>
                            <th scope='col'>Docenti accompagnatori</th> 
                            <th scope='col'>Docenti sostituti</th> 
                            <th scope='col'>Periodo data</th> 
                            <th scope='col'>Data C.d.C.</th>  
                        </tr>
                    </thead>";

    for ($A = 1; $A < $I; $A++) {
        $sql = "SELECT * FROM `proposte` WHERE `classe_name` = '$class' AND `id` = '$A'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (!empty($row)) {
            echo "<tr>";
            echo "<td scope='row'>";
            echo $row['classe_name'];
            echo "</td>";
            echo "<td scope='row'>";
            echo $row['meta'];
            echo "</td>";
            echo "<td scope='row'>";
            echo $row['docenti_acc'];
            echo "</td>";
            echo "<td scope='row'>";
            echo $row['docenti_sost'];
            echo "</td>";
            echo "<td scope='row'>";
            echo $row['periodo_data'];
            echo "</td>";
            echo "<td scope='row'>";
            echo $row['data_cdc'];
            echo "</td>";
            echo "</tr scope='row'>";
            unset($row);
        }
        unset($row);
    }
    echo "</table>";
} else
    if ($action == "mod_proposta") {
        $selected = $_POST['selected'];
        $array = explode(';', $selected);

        $array[0] = mysqli_real_escape_string($con, $array[0]);
        $array[1] = mysqli_real_escape_string($con, $array[1]);
        $array[2] = mysqli_real_escape_string($con, $array[2]);

        $sql = "SELECT * FROM `proposte` WHERE `classe_name` = '$class' AND `meta` = '$array[0]' AND `docenti_acc` = '$array[1]' AND `periodo_data` = '$array[2]' ";//completare


        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $meta = $row['meta'];
        $doc_acc = $row['docenti_acc'];
        $doc_sost = $row['docenti_sost'];
        $obb = $row['obbiettivi'];
        $data = $row['periodo_data'];
        $data_cdc = $row['data_cdc'];
        $id = $row['id'];

        echo "
        <div id=\"content-wrapper\" class=\"d-flex flex-column\">

    <!-- Main Content -->
    <div id=\"content\">

        <!-- Begin Page Content -->
        <div class=\"container-fluid\">

            <section class=\"row justify-content-center\">
                <form class=\"form-container mt-5\" id=\"stampa-modulo\" action=\"update_prop.php\" method=\"POST\">
                    <div class=\"form-group\">
                        <h1 class=\"text-center\">Modifica Proposta</h1>
                        <input type=\"hidden\" name=\"id\" value=\"$id\">
                        <br>
                        <input type=\"text\" class='form-control' name=\"destinazione\" placeholder=\"destinazione\" value=\"$meta\">
                        <br>
                        <input type=\"text\" class='form-control' name=\"doc_acc\" placeholder=\"Inserisci i docenti accompagnatori separandoli con una virgola\" value=\"$doc_acc\">
                        <br>
                        <input type='text' class='form-control' name='doc_sost' placeholder='Inserisci i docenti sostituti separandoli con una virgola' value=\"$doc_sost\">
                        <br>
                        <textarea name=\"Obiettivi1\" class='form-control' placeholder=\"Obiettivi didattici\">$obb</textarea>
                        <br>
                        <input type=\"text\" class='form-control' name=\"per_data\"  placeholder=\"Periodo Data\" value=\"$data\">
                        <br>
                        <input type=\"text\" class='form-control' name=\"data_cdc\"  placeholder=\"Data odierna Consiglio di Classe\" value=\"$data_cdc\">
                        <br>
                        <input type=\"submit\" class=\"btn btn-outline-dark btn-lg btn-block mb-1\" value=\"Invia\">
                        <br>
                        <a class='text-danger'>*Per inserire nuove proposte inviare e ritornare su proposte</a>\";                        
        ";


    } else
        if ($action == "del_proposta") {
            try {
                $selected = $_POST['selected'];
                $array = explode(';', $selected);

                $sql = "DELETE FROM `proposte` WHERE `classe_name` = '$class' AND `meta` = '$array[0]' AND `docenti_acc` = '$array[1]' AND `periodo_data` = '$array[2]' ";
                $result = mysqli_query($con, $sql);
                //header("Location: ../class_home.php");
            } catch (Exception $e) {

                echo "<p>errore nella cancellazione della proposta</p>";

            }
            echo "
						
							<h1 class='text-center mt-5'>Proposta cancellata correttamente</h1>";
        }
?>
</body>
</html>