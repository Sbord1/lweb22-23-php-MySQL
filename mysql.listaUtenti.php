<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	session_start();

	$db_name = "VideotecaOnlinedb";
	$VOuser_table = "VOuser";

// Connessione al database
	$mysqliConnection = new mysqli("localhost", "riccardo", "password", $db_name);

// Controllo connessione
	if (mysqli_connect_errno()) {
   		printf("Errore! Problemi con la connessione al db: %s\n", mysqli_connect_error());
    	exit();
}

// Selezioniamo tutti gli utenti dalla tabella VOuser
	$sqlQuery = "SELECT * FROM $VOuser_table";

// mysqli_query() esegue sul db, cui siamo connessi, la query passata
// Il risultato e' un array php, contenente le righe della tabella che sono state selezionate
	$resultQ = mysqli_query($mysqliConnection, $sqlQuery);

	if (!$resultQ) {
   		printf("Oops! La query inviata non ha avuto successo!\n");
	exit();
}

?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>Lista Utenti</title>  
    </head>

    <body style="background-color: lightyellow;">

        <table style="margin-left: auto; margin-right: auto;">
            <tbody>
                <tr>
                    <td>
                        <img src="loghi/movieCamera.png" alt="camera logo" height="80"/>
                    </td>
                    <td> 
                        <h1>Videoteca Online</h1>
                    </td>
                </tr>
            </tbody>
        </table>

        <hr />

        <h3 style="text-align: center">Lista utenti registrati nel database</h3>

        <table border="1" cellpadding="5" style="border-color: black; margin-left: auto; margin-right: auto;">
            <tbody>
                <tr style="background-color: lightgreen">
                    <th>userId</th>
                    <th>userName</th>
                    <th>tipologia</th>
                </tr>

<?php

// Per ogni utente presente nella tabella VOuser stampa una riga con le informazioni di quell'utente.
// mysqli_fetch_array() estrae una riga dal risultato e restituisce un array associativo con i valori della riga selezionata
while ($row = mysqli_fetch_array($resultQ)) {

    echo "<tr style=\"background-color: white;\">";

    echo "<td>".$row['userId']."</td>";
    echo "<td>".$row['userName']."</td>";
    echo "<td>".$row['tipologia']."</td>";

    echo "</tr>";

}

?>

            </tbody>
        </table>
		
		<h3 style="text-align: center;">
            <a href="index.php" alt="Home">Homepage</a>
        </h3>
    </body>
</html>

<?php

$mysqliConnection->close();

?>