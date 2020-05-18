<?php
// nome di host
$host = "localhost";
// nome del database
$database = "Sql958586_5";
// username dell'utente in connessione
$user = "root";
// password dell'utente
$password = "root";

/*
  blocco try/catch di gestione delle eccezioni
*/
try {
  // stringa di connessione al DBMS
  $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
}
catch(PDOException $e)
{
  // notifica in caso di errore nel tentativo di connessione
  echo $e->getMessage();
}
?>
