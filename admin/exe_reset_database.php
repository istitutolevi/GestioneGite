<?php
include('../session_admin.php');
include('script.php3');
$utente = $_SESSION['n_classe'];

    $filename = 'databaseReset.sql';
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "sql958586_5";
    $templine = '';
    $lines = file($filename);

        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "DELETE FROM proposte; DELETE FROM cronologia; DELETE FROM gita_definitiva";
        $connect->exec($query);

        echo '<script type="text/javascript"> 
                    alert("Database Reset avvenuto!") ;
              </script>';

        header("location: ../admin_home.php");

?>


