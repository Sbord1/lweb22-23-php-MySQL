<?php
	error_reporting(E_ALL &~E_NOTICE);
	
	$db_name = "VideotecaOnlinedb";
	$VOuser_table="VOuser";

// Connessione al database
	$mysqliConnection = new mysqli("localhost", "riccardo", "password", $db_name);

// Controllo connessione
	if (mysqli_connect_errno()) {
    	printf("Errore! Problemi con la connessione al db: %s\n", mysqli_connect_error());
    	exit();
	}

//print_r($_POST);

	if (isset($_POST['invio']) && $_POST['invio']=="Aggiungi" && $_POST['nome'] && $_POST['password']) {

    

    // Query per l'aggiunta dell' utente
    $sql= "INSERT INTO $VOuser_table
	(userName, password, sommeSpese, tipologia)
	VALUES
	('{$_POST['nome']}', '{$_POST['password']}', \"0\", \"user\")
	";

    // Il risultato della query va in $resultQ
    if (!$resultQ = mysqli_query($mysqliConnection, $sql)) {
        printf("Can't execute query.\n");
    exit();
    }

    
    $_POST['invio']="j";
}

// Chiudiamo la connessione, tanto il db non serve piu' in questo script
	$mysqliConnection->close();

?>


<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head> 
    	<title>Registrazione</title>
    </head>

    <body style="background-color: lightyellow;">

        <table style="margin-left: auto; margin-right: auto;">
            <tbody>
                <tr>
                    <td>
                        <a href="index.php".php">
                            <img src="loghi/movieCamera.png" alt="camera logo" height="80"/>
                        </a>
                    </td>
                    <td> 
                        <h1>Videoteca Online</h1>
                    </td>
                </tr>
            </tbody>
        </table>

        <hr />

        <h3 style="text-align: center;">Registrazione</h3>

		<form action="registrazione.php" method="post">
    

            <p style="text-align: center;">
                Nome utente: <input type="text" name="nome" size="30" required>
            </p>

            <p style="text-align: center;">
                Password: <input type="text" name="password" size="30" required>
            </p>
            
            <div style="text-align: center; padding: 10px">
                <input type="reset" value="Annulla le scelte">
                <input type="submit" name="invio" value="Aggiungi">
            </div>

            <hr />

            <h3 style="text-align: center;">
                <a href="index.php" alt="Home">Homepage</a>
            </h3>

		</form>



    </body>
<html>