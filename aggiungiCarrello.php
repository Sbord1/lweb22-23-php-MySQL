<?php

	require_once("./connection.php");
	require_once("./stileInterno.php");
	session_start();                // sempre prima di qualunque contenuto htmnl ...

	if (!isset($_SESSION['accessoPermesso'])) header('Location: loginPage.html');



// variabili per titolo e categoria del film
	$title=$_POST['title'];
	$dbCategoria=$_POST['dbCategoria'];


       
// sql query per ottenere informazioni sul film
    $sql = "SELECT *
			FROM $dbCategoria
			WHERE title = \"$title\"
        ";

		

    if (!$resultQ = mysqli_query($mysqliConnection, $sql)) {
        printf("Dammit! Can't execute movie select query.\n");
        exit();
        }

    $row= mysqli_fetch_array($resultQ); // se e' un film, sta qua - senno' vuota
    
    //creo output table
    
    $output_table="<p style=\" position: absolute; font-size: 21px; color: white; margin-top:5%; left:30%\"> Gentile cliente\n";
	$output_table.= $_SESSION['userName'];
	$output_table.=",\n vuoi aggiungere al carrello il seguente articolo?\n <br /> <br />";
	$output_table.="$title \n <br />costo: $row[costoMovie] \n (&euro;)</p>";
 	

	// mostra immagine film
	$output_table.="<table style=\" position: absolute; margin-right:auto\">\n <tr>\n";
	$output_table.="<td class=\"img\">\n  <img src=\"$row[imgPath]\" alt=\"$row[title]\" height=\"450px\"/>\n </td>\n";
	$output_table.="</tr>\n";                 
	$output_table.="</table>\n";

	// variabile per prezzo film
	$prezz = $row['costoMovie']; 
    
    //per passare il nome del film seguito dal costo (viene utilizzato nella form successiva)
    
   	$value="";
    $value.=$title;
	$value.="\n(&euro; $row[costoMovie])"; 

	$page = "";

    // Controllo categoria
	switch($dbCategoria) {

		case "VOmovieAvventura":
			$page = "AdventureMovies.php";
			break;

		case "VOmovieAzione":
			$page = "ActionMovies.php";
			break;

		case "VOmovieFantascienza":
			$page = "FantasyMovies.php";
			break;

		case "VOmoviePoliziesco":
			$page = "poliziesco.php";
			break;

		case "VOmovieStorico":
			$page = "storico.php";
			break;

		case "VOmovieThriller":
			$page = "thriller.php";
			break;

	}

	// bottoni
	
	$output_buttons="<table style=\"margin-right: auto; margin-left:auto; margin-top:15%\">\n<tr>\n<td>\n";
	$output_buttons.="<form action=\"./$page\"  method=\"post\" >\n";
	$output_buttons.="<input type=\"submit\" name=\"aggiungiCarrello\" value=\"Aggiungi al carrello\">\n"; // bottone aggiungiCarrello
	$output_buttons.= "<input type=\"hidden\" name=\"title\" value=\"$value\">\n <input type=\"hidden\" name=\"costo\" value=\"$prezz\"></form>\n </td>\n <td>\n"; // hidden fields
	$output_buttons.="<form action=\"./index.php\"  method=\"post\" >\n<input type=\"submit\" name=\"azzerra\" value=\"Go back\">\n </form>\n </td>\n</tr>\n</table>\n";
		
    // fine output_table

	// ok, adesso chiudiamo la connessione, tanto il db non serve piu' in questo script
	$mysqliConnection->close();

?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>sessione con carrello della spesa: pagamento</title>
	</head>

	<body style= "background-color: #34495E" >
	
	<!-- menu -->
		<?php
			require("./menuConSwitch.php");
		?>

		<hr />


		<?php
			echo $output_table;
			echo $output_buttons;
		?>


	</body>
</html>
