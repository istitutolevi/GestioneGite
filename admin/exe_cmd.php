<?php
include('../session_admin.php');
include('../conn_serv.php');
$action = $_POST['gestione_account'];
$name = $_POST['selected'];
$user = $_SESSION['n_classe'];
if ($action == "User_become_class") {
    $sql = "UPDATE users SET tipo='0' WHERE class_name='$name'";
    if ($con->query($sql) === TRUE) {
        header("Location: ../admin_home.php");
    } else {
        echo "Errore nell'update dell'utente: " . $con->error;
    }
    $con->close();
} else
    if ($action == "User_become_admin") {
        $sql = "UPDATE users SET tipo='1' WHERE class_name='$name'";
        if ($con->query($sql) === TRUE) {
            header("Location: ../admin_home.php");
        } else {
            echo "Errore nell'update dell'utente: " . $con->error;
        }
        $con->close();
    } else
        if ($action == "Delete_User") {

            if ($name == $user) {
                $sql = "DELETE FROM users WHERE class_name = '$name'";
                session_destroy();
                header("Location: ../index.php");
            } else
                $sql = "DELETE FROM users WHERE class_name = '$name'";
            if ($con->query($sql) === TRUE) {
                header("Location: ../admin_home.php");
            } else {
                echo "Errore nell'eliminazione dell'utente " . $con->error;
            }
            $con->close();
        } else
            if ($action == "Change_User_Password") {

                $psw1 = $_POST['pass1'];
                $psw2 = $_POST['pass2'];
                if ($psw1 != $psw2 || empty($psw1) || empty($psw2)) {
                    echo("Password non coincidenti o assenti");
                    echo("<a href=\"gestione_account.php\">Ritorna alla gestione account</a>");
                } else {
                    $psw1 = MD5($psw1);
                    $sql1 = "UPDATE users SET password='$psw1' WHERE class_name = '$name'";
                    if ($con->query($sql1) === TRUE) {
                        header("Location: ../admin_home.php");
                    }


                }
                $con->close();
            } else
                if (empty($action)) {
                    header("Location: ../admin_home.php");
                }
?>