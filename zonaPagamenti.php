<?php
	error_reporting (E_ALL &~E_NOTICE);
	require_once("./stileInterno.php");
	session_start();                // sempre prima di qualunque contenuto htmnl ...

	if (!isset($_SESSION['accessoPermesso'])) header('Location: loginPage.html');

	if(!isset($_SESSION['sommeDaPagare']))
		$totale = 0;
	else
		$totale = $_SESSION['sommeDaPagare'];


	require_once("./connection.php");

	$output_table="";
	$output_table.="<table style= \" margin-left: 10%; margin-top: 5%\">";
	
// stampiamo i film che sono presenti nel carrello
	foreach ($_SESSION['carrello'] as $k=>$v) {
    	$output_table.="<tr>\n<td style=\"color: white; font-size: 20px\">$v</td>\n";
	}
		$output_table.="</tr>\n<tr>\n<td style=\"color: white; font-size: 20px\"><br />\nSomma totale: $totale\n &euro; </td>\n";
		$output_table.="</tr>\n</table>";


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

		<h2 style=" text-align: center; color: #FDEBD0; margin-top: 20px; font-size: 30px " >Carrello</h2>




		<?php
		echo $output_table;
		?>

		<table style="margin-right: auto; margin-left:auto; margin-top:15%">
			<tr>
				<form action="decisione.php"  method="post" >
				<td> <input type="submit" name="acquista" value="Acquista"> </td>
				<td> <input type="submit" name="azzerra" value="Svuota il carrello"> </td>
				</form>
			</tr> 
		</table>	


	</body>
</html>
