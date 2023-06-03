<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>Creazione e Popolamento VideotecaOnlinedb</title></head>

<body>
<h3>Creazione e Popolamento VideotecaOnlinedb</h3>

<?php			
error_reporting(E_ALL &~E_NOTICE);

 // dati sul database e le tabelle (magari messi in un file a parte ...)
 $db_name = "VideotecaOnlinedb";
 $VOuser_table = "VOuser";
 $VOmovie_avventura_table = "VOmovieAvventura";
 $VOmovie_azione_table = "VOmovieAzione";
 $VOmovie_fantascienza_table = "VOmovieFantascienza";
 $VOmovie_poliziesco_table = "VOmoviePoliziesco";
 $VOmovie_storico_table = "VOmovieStorico";
 $VOmovie_thriller_table = "VOmovieThriller";

///////////////////////////////////////////////////////////////////////////////
// effettuazione della connessione al database

$mysqliConnection = new mysqli("localhost", "riccardo", "password");

// controllo della connessione
if (mysqli_connect_errno()) {
    printf("Oops! Problemi con la connessione al db: %s\n", mysqli_connect_error());
    exit();
}
///////////////////////////////////////////////////////////////////////////////
// creazione del database

$queryCreazioneDatabase = "CREATE DATABASE $db_name";
// il risultato della query va in $resultQ
$resultQ = mysqli_query($mysqliConnection, $queryCreazioneDatabase);
if ($resultQ) {
    printf("Database %s creato!\n", $db_name);
}
else {
    printf("Whoops! Niente creazione del db!\n");
    exit();
}

// Adesso chiudiamo la connessione
$mysqliConnection->close();
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
// e la riapriamo con il collegamento alla base di dati
$mysqliConnection = new mysqli("localhost", "riccardo", "password", $db_name);
// controllo della connessione
if (mysqli_errno($mysqliConnection)) {
    printf("Oops, abbiamo problemi con la connessione al db: %s\n", mysqli_error($mysqliConnection));
    exit();
}

// Creazione tabella utenti
$sqlQuery = "CREATE TABLE if not exists $VOuser_table (";
$sqlQuery.= "userId int NOT NULL auto_increment, primary key (userId), ";
$sqlQuery.= "userName varchar (50) NOT NULL, ";
$sqlQuery.= "password varchar (32) NOT NULL, ";
$sqlQuery.= "sommeSpese float,";
$sqlQuery.= "tipologia varchar(5) NOT NULL"; // user o admin
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";

$resultQ = mysqli_query($mysqliConnection, $sqlQuery);
if ($resultQ)
    printf("Tabella Utenti creata!\n");
else {
    printf("Whoops! Niente creazione Tabella Utenti!\n");
  exit();
}

// Creazione tabella movie categoria Avventura
$sqlQuery = "CREATE TABLE if not exists $VOmovie_avventura_table (";
$sqlQuery.= "movieId int NOT NULL auto_increment, primary key (movieId), ";
$sqlQuery.= "title varchar (100) NOT NULL, ";
$sqlQuery.= "costoMovie float, ";
$sqlQuery.= "imgPath varchar(150)";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella Movie Avventura creata!\n");
else {
    printf("Whoops! Niente creazione Tabella Movie!\n");
  exit();
}

// Creazione tabella movie categoria Azione
$sqlQuery = "CREATE TABLE if not exists $VOmovie_azione_table (";
$sqlQuery.= "movieId int NOT NULL auto_increment, primary key (movieId), ";
$sqlQuery.= "title varchar (100) NOT NULL, ";
$sqlQuery.= "costoMovie float, ";
$sqlQuery.= "imgPath varchar(150)";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella Movie Azione creata!\n");
else {
    printf("Whoops! Niente creazione Tabella Movie!\n");
  exit();
}

// Creazione tabella movie categoria Fantascienza
$sqlQuery = "CREATE TABLE if not exists $VOmovie_fantascienza_table (";
$sqlQuery.= "movieId int NOT NULL auto_increment, primary key (movieId), ";
$sqlQuery.= "title varchar (100) NOT NULL, ";
$sqlQuery.= "costoMovie float, ";
$sqlQuery.= "imgPath varchar(150)";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella Movie Fantascienza creata!\n");
else {
    printf("Whoops! Niente creazione Tabella Movie!\n");
  exit();
}

// Creazione tabella movie categoria Poliziesco
$sqlQuery = "CREATE TABLE if not exists $VOmovie_poliziesco_table (";
$sqlQuery.= "movieId int NOT NULL auto_increment, primary key (movieId), ";
$sqlQuery.= "title varchar (100) NOT NULL, ";
$sqlQuery.= "costoMovie float, ";
$sqlQuery.= "imgPath varchar(150)";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella Movie Poliziesco creata!\n");
else {
    printf("Whoops! Niente creazione Tabella Movie!\n");
  exit();
}

// Creazione tabella movie categoria Storico
$sqlQuery = "CREATE TABLE if not exists $VOmovie_storico_table (";
$sqlQuery.= "movieId int NOT NULL auto_increment, primary key (movieId), ";
$sqlQuery.= "title varchar (100) NOT NULL, ";
$sqlQuery.= "costoMovie float, ";
$sqlQuery.= "imgPath varchar(150)";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella Movie Storico creata!\n");
else {
    printf("Whoops! Niente creazione Tabella Movie!\n");
  exit();
}

// Creazione tabella movie categoria Thriller
$sqlQuery = "CREATE TABLE if not exists $VOmovie_thriller_table (";
$sqlQuery.= "movieId int NOT NULL auto_increment, primary key (movieId), ";
$sqlQuery.= "title varchar (100) NOT NULL, ";
$sqlQuery.= "costoMovie float, ";
$sqlQuery.= "imgPath varchar(150)";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella Movie Thriller creata!\n");
else {
    printf("Whoops! Niente creazione Tabella Movie!\n");
  exit();
}

/*
$sqlQuery = "CREATE TABLE if not exists $STgadget_table_name (";
$sqlQuery.= "gadgetId int NOT NULL auto_increment, primary key (gadgetId), ";
$sqlQuery.= "nome varchar (100) NOT NULL, ";
$sqlQuery.= "costoGadget float ";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella gadget creatA ...\n");
else {
    printf("Whoops! niente creazione Tabella gadget! Che sara' successo??.\n");
  exit();
}
*/

//echo mysqli_errno($mysqliConnection);
///////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////
// popolamento Tabella VOuser (NB tre campi: userId gestito automaticamente)

// Inserimento utente
$sql = "INSERT INTO $VOuser_table
	(userName, password, sommeSpese, tipologia)
	VALUES
	(\"ric\", \"ric\", \"0\", \"user\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Utente inserito!\n");
else {
    printf("Whoops! Couldn't populate VOuser table.\n");
  exit();
}

// Inserimento utente
$sql = "INSERT INTO $VOuser_table
	(userName, password, sommeSpese, tipologia)
	VALUES
	(\"fra\", \"fra\", \"0\", \"user\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Utente inserito!\n");
else {
    printf("Whoops! Couldn't populate VOuser table.\n");
  exit();
}

// Inserimento admin
$sql = "INSERT INTO $VOuser_table
	(userName, password, sommeSpese, tipologia)
	VALUES
	(\"amministratore\", \"amministratore\", \"0\", \"admin\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Utente inserito!\n");
else {
    printf("Whoops! Couldn't populate VOuser table.\n");
  exit();
}


///////////////////////////////////////////////////////////////////////////////
// popolamento Tabella VOmovieAvventura (NB tre campi: movieId gestito automaticamente)

// Inserimento movie
$sql = "INSERT INTO $VOmovie_avventura_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M1 - Revenant\", \"120\", \"locandine/avventura/revenant.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_avventura_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M2 - Jumanji\", '130.00', \"locandine/avventura/jumanji.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_avventura_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M3 - Avatar\", '90.00', \"locandine/avventura/avatar.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate STMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_avventura_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M4 - Jurassic World\", '100.00', \"locandine/avventura/jurassic world.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate STMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_avventura_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M5 - Everest\", '80.00', \"locandine/avventura/everest.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate STMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_avventura_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M6 - Uncharted\", \"125.00\", \"locandine/avventura/uncharted.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate STMovie table.\n");
  exit();
}

///////////////////////////////////////////////////////////////////////////////
// popolamento Tabella VOmovieAzione (NB tre campi: movieId gestito automaticamente)

// Inserimento movie
$sql = "INSERT INTO $VOmovie_azione_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M1 - Mission Impossible\", \"120\", \"locandine/azione/MissionImpossible.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_azione_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M2 - KillBill\", \"120\", \"locandine/azione/KillBill.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_azione_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M3 - John Wick\", \"120\", \"locandine/azione/JohnWick.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_azione_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M4 - Old Boy\", \"120\", \"locandine/azione/OldBoy.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_azione_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M5 - Taken\", \"120\", \"locandine/azione/Taken.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_azione_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M6 - Tower Heist\", \"120\", \"locandine/azione/TowerHeist.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_azione_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M7 - Bastardi Senza Gloria\", \"120\", \"locandine/azione/BastardiSenzaGloria.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_azione_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M8 - A-Team\", \"120\", \"locandine/azione/ATeam.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

///////////////////////////////////////////////////////////////////////////////
// popolamento Tabella VOmovieFantascienza (NB tre campi: movieId gestito automaticamente)

// Inserimento movie
$sql = "INSERT INTO $VOmovie_fantascienza_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M1 - Dune\", \"120\", \"locandine/fantascienza/Dune.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_fantascienza_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M2 - Star Wars\", \"120\", \"locandine/fantascienza/starwars.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_fantascienza_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M3 - Harry Potter\", \"120\", \"locandine/fantascienza/HarryPotter.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_fantascienza_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M4 - La fabbrica di cioccolato\", \"120\", \"locandine/fantascienza/LaFabbricadiCioccolato.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_fantascienza_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M5 - Frozen\", \"120\", \"locandine/fantascienza/frozen.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_fantascienza_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M6 - Lo Hobbit\", \"120\", \"locandine/fantascienza/Hobbit.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_fantascienza_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M7 - Avengers\", \"120\", \"locandine/fantascienza/Avengers.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_fantascienza_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M8 - Blade Runner\", \"120\", \"locandine/fantascienza/bladerunner.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_fantascienza_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M9 - Segnali dal Futuro\", \"120\", \"locandine/fantascienza/segnalifuturo.jpeg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

///////////////////////////////////////////////////////////////////////////////
// popolamento Tabella VOmoviePoliziesco (NB tre campi: movieId gestito automaticamente)

// Inserimento movie
$sql = "INSERT INTO $VOmovie_poliziesco_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M1 - The Departed\", \"120\", \"locandine/poliziesco/thedeparted.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_poliziesco_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M2 - Legend\", \"120\", \"locandine/poliziesco/legend.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_poliziesco_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M3 - Sherlock Holmes\", \"120\", \"locandine/poliziesco/sherlockholmes.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_poliziesco_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M4 - Barry Seal\", \"120\", \"locandine/poliziesco/barryseal.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_poliziesco_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M5 - Diabolik\", \"120\", \"locandine/poliziesco/diabolik.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_poliziesco_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M6 - Gone Baby Gone\", \"120\", \"locandine/poliziesco/gonebabygone.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_poliziesco_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M7 - Il Traditore\", \"120\", \"locandine/poliziesco/iltraditore.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_poliziesco_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M8 - Inside Man\", \"120\", \"locandine/poliziesco/insideman.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_poliziesco_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M9 - TrainingDay\", \"120\", \"locandine/poliziesco/trainingday.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

///////////////////////////////////////////////////////////////////////////////
// popolamento Tabella VOmovieStorico (NB tre campi: movieId gestito automaticamente)

// Inserimento movie
$sql = "INSERT INTO $VOmovie_storico_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M1 - Dunkirk\", \"120\", \"locandine/storico/dunkirk.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_storico_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M2 - Edison\", \"120\", \"locandine/storico/edison.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_storico_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M3 - Il Gladiatore\", \"120\", \"locandine/storico/ilgladiatore.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_storico_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M4 - Il primo Re\", \"120\", \"locandine/storico/ilprimore.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_storico_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M5 - Il Processo ai Chicago 7\", \"120\", \"locandine/storico/ilprocessoai7.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_storico_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M6 - Red Land\", \"120\", \"locandine/storico/redland.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_storico_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M7 - Selma\", \"120\", \"locandine/storico/selma.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_storico_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M8 - The Eichmann Show\", \"120\", \"locandine/storico/theeichmannshow.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_storico_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M9 - The Imitation Game\", \"120\", \"locandine/storico/theimitationgame.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}


///////////////////////////////////////////////////////////////////////////////
// popolamento Tabella VOmovieThriller (NB tre campi: movieId gestito automaticamente)

// Inserimento movie
$sql = "INSERT INTO $VOmovie_thriller_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M1 - Collateral\", \"120\", \"locandine/thriller/collateral.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_thriller_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M2 - Le Strade del Male\", \"120\", \"locandine/thriller/lestradedelmale.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_thriller_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M3 - Non e' un paese per vecchi\", \"120\", \"locandine/thriller/noneunpaesepervecchi.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_thriller_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M4 - Scappa-GetOut\", \"120\", \"locandine/thriller/scappa-getout.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_thriller_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M5 - Scarface\", \"120\", \"locandine/thriller/scarface.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_thriller_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M6 - Shutter Island\", \"120\", \"locandine/thriller/shutterisland.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_thriller_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M7 - Split\", \"120\", \"locandine/thriller/split.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_thriller_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M8 - The Hateful Eight\", \"120\", \"locandine/thriller/thehatefuleight.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

// Inserimento movie
$sql = "INSERT INTO $VOmovie_thriller_table
	(title, costoMovie, imgPath)
	VALUES
	(\"M9 - Zodiac\", \"120\", \"locandine/thriller/zodiac.jpg\")
	";
echo "<P>$sql</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sql))
    printf("Movie inserito con successo!\n");
else {
    printf("Whoops! Couldn't populate VOMovie table.\n");
  exit();
}

/////////////////////////////////////////////////////////////////////

// altro modo di chiudere la connessione al db
mysqli_close($mysqliConnection);


?>

</body>
</html>