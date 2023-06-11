<?php

  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  // dati sul database e le tabelle (magari messi in un file a parte ...)
  $db_name = "VideotecaOnlinedb";
  $VOuser_table = "VOuser";
  $VOmovie_table = "VOmovie";
  $VOmovie_azione_table = "VOmovieAzione";
  $VOmovie_avventura_table = "VOmovieAvventura";
  $VOmovie_fantascienza_table = "VOmovieFantascienza";
  $VOmovie_poliziesco_table = "VOmoviePoliziesco";
  $VOmovie_storico_table = "VOmovieStorico";
  $VOmovie_thriller_table = "VOmovieThriller";

  // mysqli: oggetto la cui creazione corrisponde all'effettuazione della connessione al database
  // localhost e' l'host su cui gira il dbms MySQL;
  // riccardo, con password password e' un esempio di utente mysql (registrato sul dbms con la possibilita' di accedere ad alcune basi di dati).
  $mysqliConnection = new mysqli("localhost", "riccardo", "password", $db_name);

  // Controllo della connessione
  // mysqli_errno() and mysqli_error() restituiscono codici e messaggi relativi all'ultimo errore
  if (mysqli_connect_errno()) {
      printf("Errore! Problemi con la connessione al db: %s\n", mysqli_connect_error());
      exit();
  }

?>