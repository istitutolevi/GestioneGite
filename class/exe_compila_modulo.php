<?php
include('../conn_serv.php');
include('../session_class.php');
$docenteResp = addslashes(strtoupper($_POST['doc_resp']));
$docentiAcc = addslashes(strtoupper($_POST['doc_acc']));
$dataUscita = addslashes(strtoupper($_POST['data_gita']));
$mezzo = addslashes(strtoupper($_POST['mezzo']));
$classe = addslashes(strtoupper($_POST['class_name']));
$n_alun_freq = addslashes(strtoupper($_POST['n_alunni']));
$dueterzi = addslashes(strtoupper($_POST['div_t']));
$alun_partecipanti = addslashes(strtoupper($_POST['al_p']));
$insegnante = $_POST['ins'];
$insegnante_sost = $_POST['sost'];
$data_od = addslashes(strtoupper($_POST['data_consiglio']));
$destinazione = addslashes(strtoupper($_POST['destinazione']));
$totale_stud_par = addslashes(strtoupper($_POST['n_stud']));
$ora_arrivo = addslashes(strtoupper($_POST['ora_arr']));
$ora_partenza = addslashes(strtoupper($_POST['ora_par']));
$ora_itin = $_POST['ora'];
$descrizione = $_POST['descrizione'];
$dataIt = $_POST['datIt'];
$programma = "";

for ($a = 0; $a < count($descrizione); $a++) {
    if ($a < count($descrizione) - 1) {
        $programma = $programma . $dataIt[$a] . "##" . $ora_itin[$a] . "##" . addslashes(strtoupper($descrizione[$a])) . "||";
    } else {
        $programma = $programma . $dataIt[$a] . "##" . $ora_itin[$a] . "##" . addslashes(strtoupper($descrizione[$a]));
    }
}

for ($a = 0; $a < count($insegnante); $a++) {
    $insegnante[$a] = addslashes(strtoupper($insegnante[$a]));
    $insegnante_sost[$a] = addslashes(strtoupper($insegnante_sost[$a]));
    if ((!empty($classe) && !empty($n_alun_freq) && !empty($dueterzi) && !empty($alun_partecipanti)) || (!empty($insegnante) && !empty($insegnante_sost))) {
        $sql = "INSERT INTO `gita_definitiva` VALUES (NULL ,'$data_od','$destinazione', '$dataUscita','$ora_partenza' ,'$ora_arrivo','$mezzo','$docenteResp','$classe','$n_alun_freq','$dueterzi','$alun_partecipanti','$totale_stud_par','$docentiAcc',  '$insegnante[$a]','$insegnante_sost[$a]', '$programma')";
        mysqli_query($con, $sql);
        $sql = "SET @count = 0";
        mysqli_query($con, $sql);
        $sql = "UPDATE `gita_definitiva` SET `gita_definitiva`.`id` = @count:= @count + 1";
        mysqli_query($con, $sql);
    }
}
echo "<script>alert('Il modulo è stato registrato.')</script>";
header("Location: ../class_home.php");
?>

<script>
    window.location.href = 'class_home.php';
</script>