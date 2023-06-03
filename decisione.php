<?php
	error_reporting (E_ALL &~E_NOTICE);
	require_once("./stileInterno.php");
	session_start();                // sempre prima di qualunque contenuto htmnl ...

	if (!isset($_SESSION['accessoPermesso'])) header('Location: login.php');

// dati sul database e le tabelle (magari messi in un file a parte ...)

	$db_name = "VideotecaOnlinedb";
	$totale= $_SESSION['sommeDaPagare'];


// effettuazione della connessione al database

	$mysqliConnection = new mysqli("localhost", "riccardo", "password", $db_name);


// controllo della connessione (versione "procedurale,
// as opposed to the "object-oriented version" msqli->connect_errno...

	if (mysqli_connect_errno()) {
    	printf("Oops, abbiamo problemi con la connessione al db: %s\n", mysqli_connect_error());
    	exit();
	}
	
	$output="";
	
// se il carrello è vuoto
	if (!$_SESSION['carrello']){
		$output.="<h1 style=\"color: white; font-size: 20px; text-align: center\"> Il carrello è vuoto, compra qualcosa! </h1>";
	}

// se hai cliccato qualcosa
	else {
	
	// se hai cliccato azzerra
		if ((!isset($_SESSION['carrello']) && !$_POST) || isset($_POST['azzerra'])) {
			$output.= "<h1 style=\"color: white; font-size: 20px; text-align: center\"> carrello svuotato </h1>";
			$_SESSION['carrello']=array();
			$_SESSION['sommeDaPagare']=0;
		}
		
	//se hai cliccato acquista
		else {
			if (isset($_POST['acquista']) && $_SESSION['carrello']){
	
			$output.="<h1 style=\"color: white; font-size: 20px; text-align: center\"> Hai completato l'acquisto! </h1>";
			$_SESSION['carrello']=array();
			$_SESSION['sommeDaPagare']=0;
		
			}
	
		}
	}  
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
	<?php
		require("./menuConSwitch.php");
	?>

	<hr />

	<h2 style=" text-align: center; color: #FDEBD0; margin-top: 20px; font-size: 30px " >Decisione finale</h2>
	<?php echo $output ?>



	</body>
</html>