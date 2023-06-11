<?php

require_once("./connection.php");


$STmovie_table_name = "";



//print_r($_POST);
if (isset($_POST['invio']) && $_POST['invio']=="Aggiungi" && $_POST['titolo'] && $_POST['costo']) {

    // Dalla form conosciamo la categoria del film e quindi la relativa tabella
    $STmovie_table_name = $_POST['categoria'];
    
    // Concateniamo il path della cartella al nome del file caricato
    $locandineAvventura = "locandine/avventura/";
    $locandineAzione = "locandine/azione/";
    $locandineFantascienza = "locandine/fantascienza/";
    $locandinePoliziesco = "locandine/poliziesco/";
    $locandineStorico = "locandine/storico/";
    $locandineThriller = "locandine/thriller/";
    
     // Path della cartella contenente il file caricato concatenato al nome del file
    $fileName = "";
    
    switch ($STmovie_table_name) {

        case "VOmovieAvventura":
            $fileName = $locandineAvventura.$_POST['filename'];
            break;
        
        case "VOmovieAzione":
            $fileName = $locandineAzione.$_POST['filename'];
            break;
        
        case "VOmovieFantascienza":
            $fileName = $locandineFantascienza.$_POST['filename'];
            break;
    
        case "VOmoviePoliziesco":
            $fileName = $locandinePoliziesco.$_POST['filename'];
            break;

        case "VOmovieStorico":
            $fileName = $locandineStorico.$_POST['filename'];
            break;
    
        case "VOmovieThriller":
            $fileName = $locandineThriller.$_POST['filename'];
            break;

        default:
            $fileName = $_POST['filename'];

    }

    // Query per l'aggiunta del film
    $sql = "INSERT INTO $STmovie_table_name
	(title, costoMovie, imgPath)
	VALUES
	('{$_POST['titolo']}', '{$_POST['costo']}', '{$fileName}')
	";

    // Il risultato della query va in $resultQ
    if (!$resultQ = mysqli_query($mysqliConnection, $sql)) {
        printf("Can't execute query.\n");
    exit();
    }

    echo "<h3>".$_POST['titolo']." &egrave; stato aggiunto in ".$STmovie_table_name.".</h3>\n";

    $_POST['invio']="j";
}

// Chiudiamo la connessione, tanto il db non serve piu' in questo script
$mysqliConnection->close();

?>


<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head> 
    <title>Aggiunta Movie</title>
    </head>

    <body style="background-color: lightyellow;">

        <table style="margin-left: auto; margin-right: auto;">
            <tbody>
                <tr>
                    <td>
                        <a href="index.php">
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

        <h3 style="text-align: center;">Uso privilegiato per aggiunta film nella tabella della relativa categoria</h3>

        <form action="mysql.aggiuntaMovie.php" method="post">

            <p style="text-align: center;">Seleziona una categori di film:</p>

            <div style="text-align: center">
                <select name="categoria">
                    <option value="VOmovieAvventura" selected="selected">Avventura</option>
                    <option value="VOmovieAzione">Azione</option>
                    <option value="VOmovieFantascienza">Fantascienza</option>
                    <option value="VOmoviePoliziesco">Poliziesco</option>
                    <option value="VOmovieStorico">Storico</option>
                    <option value="VOmovieThriller">Thriller</option>
                </select>
            </div>

            <p style="text-align: center;">
                Titolo film: <input type="text" name="titolo" size="30" required>
            </p>

            <p style="text-align: center;">
                Costo film: <input type="number" name="costo" size="30" required>
            </p>
            
            <p style="text-align: center;">Carica una copertina per il film:</p>

            <?php // $_POST['filename'] conterra' il nome del file caricato ?>
            <div style="text-align: center;">
                <input type="file" name="filename" accept="image/png, image/jpeg" required>
            </div>
            
            
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
