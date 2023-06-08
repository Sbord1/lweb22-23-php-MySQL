<?php
	error_reporting (E_ALL &~E_NOTICE);
	require_once("./stileInterno.php");

	session_start();

	if(!isset($_SESSION['sommeDaPagare'])) {
		$_SESSION['sommeDaPagare'] = 0;
	}

	// aggiungo film al carrello se provengo da aggiungiCarrello.php e ho cliccato "aggiungiCarrello" e aggiorno variabili
	if (isset($_POST['aggiungiCarrello'])){
		$_SESSION['carrello'][] = $_POST['title'];
		$_SESSION['spesaFinora']+=$_POST['costo'];
		  $_SESSION['sommeDaPagare']+=$_POST['costo'];
   }

// dati sul database e le tabelle (magari messi in un file a parte ...)
	$db_name = "VideotecaOnlinedb";
	$VOmovie_thriller_table = "VOmovieThriller";


// effettuazione della connessione al database

	$mysqliConnection = new mysqli("localhost", "riccardo", "password", $db_name);


// controllo della connessione

	if (mysqli_connect_errno()) {
    	printf("Oops, abbiamo problemi con la connessione al db: %s\n", mysqli_connect_error());
    	exit();
	}



//sql query per ottenere tutti gli attributi dei film
	$sql = "SELECT *
       FROM $VOmovie_thriller_table
	";

// il risultato della query va in $resultQ
	if (!$resultQ = mysqli_query($mysqliConnection, $sql)) {
    	printf("Dammit! Can't execute movie select query.\n");
 		exit();
 	}

/*
	Se non e' stato fatto il login il visitatore puo' comunque visualizzare tutti i film disponibili
	ma non potra' effettuare l'acquisto (aggiungiCarrello.php controlla se il login e' stato effettuato)
*/

// costruzione elenco film
// costruiamo un elemento input di tipo image,
// con nome comune "selection"

	$elenco="<table class= tablecenter>\n <tr>\n";
	$counter=0; //variabile per avere solo 3 film per riga
	while ($row = mysqli_fetch_array($resultQ)){
	
	// costruzione tabella con immagini
	
		$elenco.="<form action=\"./aggiungiCarrello.php\" method=\"post\">\n";
		$elenco.="<td class=\"img\">\n  <input type=\"image\" src=\"$row[imgPath]\" name=\"selection\" value=\"$row[title]\" height=\"450px\"/>\n";
		
	// costruzione hidden field che ci servirà nella zona aggiungiCarrello per ottenere il nome del film e della categoria
		$elenco.="<input type=\"hidden\" name=\"title\" value=\"$row[title]\">\n";
		$elenco.="<input type=\"hidden\" name=\"dbCategoria\" value=\"$VOmovie_thriller_table\"> </td> \n </form>\n";
		$counter++;
	
	 	if ($counter>=3){ //quando ci sono 3 film per riga, vai alla riga successiva
 			$elenco.="</tr>\n <tr>\n";
 			$counter=0;
 		}
  	}
	$elenco.= "</tr>\n</table>";


// ok, adesso chiudiamo la connessione, tanto il db non serve piu' in questo script
	$mysqliConnection->close();

?>


<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 
	<head>
		<title> Thriller movies </title>
		<?php echo $stileInterno; ?>
	</head>

	<body style= "background-color: #34495E" >
	
	<p>
		<a href="index.php">
        	<img src="loghi/home.png" alt="home" style="float: right; height: 30px;" />
    	</a>

		<?php
			// Se e' stato fatto il login compare il logo del carrello
            if(isset($_SESSION['userName'])) {
				echo "<a href=\"zonaPagamenti.php\">
						<img src=\"loghi/cartLogo.png\" alt=\"cart logo\" style=\"float: right; height: 30px;\"/>
					</a>";
			}

			?>
	</p>
	
	<h1 style=" text-align: center; color: #FDEBD0; margin-top: 20px " >Thriller movies </h1>
	
	<p style="text-align: center; color:white">
        	Film thriller disponibili nel nostro store. Cliccando sulla copertina del film potrai effettuarne l'acquisto.
    </p>

	<table>

		<?php echo $elenco ?>; <!-- mostra film -->
	</table>
	
	
<!-- back to top -->	
<table class="tablecenter">
	<tbody>
            <tr>
                <td style="background-color: #FDEBD0;">
                    <a href="#top">Back to top</a>
                </td>
            </tr>
    	</tbody>
</table>
    
	<div class="menu">
			<ul>
 				<li><a href="index.php">Home </a> </li>
 				<li><a href="AdventureMovies.php">Adventure</a> </li>
 				<li><a href="FantasyMovies.php">Fantasy</a> </li>
 				<li><a href="poliziesco.php">Crime </a> </li>
 				<li><a href="storico.php">Storico </a> </li> 
 				<li><a href="thriller.php">Thriller </a> </li> 
			</ul>
  
	</div>
	
	</body>
</html>
