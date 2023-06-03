<?php

// Controllo tipologia: se non e' settata allora il login non e' stato effettuato
if (!isset($_SESSION['tipologia'])) { //no login
    
    // escaping from interspersed.php
?>

    <!-- Se il login non e' stato effettuato (siamo un semplice visitatore) allora stampiamo il menu senza il carrello! -->
    <table border="1" cellpadding="5" style="border-color: black; margin-left: auto; margin-right: auto;">
        <tbody>
            <tr>
                <td style="background-color: lightgray;">
                    <a href="index.php">Home</a>
                </td>

                <td style="background-color: lightgray;">
                    <a href="AdventureMovies.php">Avventura</a>
                </td>

                <td style="background-color: lightgray;">
                    <a href="ActionMovies.php">Azione</a>
                </td>

                <td style="background-color: lightgray;">
                    <a href="FantasyMovies.php">Fantascienza</a>
                </td>

                <td style="background-color: lightgray;">
                    <a href="poliziesco.php">Poliziesco</a>
                </td>

                <td style="background-color: lightgray;">
                    <a href="storico.php">Storico</a>
                </td>
                
                

                
            </tr>    
        </tbody>
</table>

<?php

}

// Il login e' stato effettuato
else {

    // Un utente puo' essere di 2 tipi: user (cliente) oppure admin (amministratore)

    switch($_SESSION['tipologia']) {

        // Utente cliente loggato --> mostriamo il carrello nel menu
        case "user":

?>
        <table border="1" cellpadding="5" style="border-color: black; margin-left: auto; margin-right: auto;">
            <tbody>
                <tr>
                    <td style="background-color: lightgray;">
                        <a href="index.php">Home</a>
                    </td>

                    <td style="background-color: lightgray;">
                        <a href="AdventureMovies.php">Avventura</a>
                    </td>

                    <td style="background-color: lightgray;">
                        <a href="ActionMovies.php">Azione</a>
                    </td>

                    <td style="background-color: lightgray;">
                        <a href="FantasyMovies.php">Fantascienza</a>
                    </td>

                    <td style="background-color: lightgray;">
                        <a href="poliziesco.php">Poliziesco</a>
                    </td>

                    <td style="background-color: lightgray;">
                        <a href="storico.php">Storico</a>
                    </td>

                    <td style="background-color: lightgray;">
                        <a href="thriller.php">Thriller</a>
                    </td>
                    
                    <td style="background-color: white;">
                        <a href="zonaPagamenti.php">
                            <img src="loghi/cartLogo.png" alt="cart logo" height="20" />
                        </a>
                    </td>
                    

                </tr>    
            </tbody>
        </table>

<?php
        break;
    
        // Utente amministratore loggato
        // --> mostriamo nel menu il bottone per aggiungere film e quello per vedere la lista di utenti registrati al sito
        case "admin":
?>
	
        <table border="1" cellpadding="5" style="border-color: black; margin-left: auto; margin-right: auto;">
            <tbody>
                <tr>
                    <td style="background-color: lightgray;">
                        <a href="index.php">Home</a>
                    </td>

                    <td style="background-color: lightgray;">
                    	<a href="AdventureMovies.php"> Avventura </a>

                    </td>

                    <td style="background-color: lightgray;">
                        <a href="ActionMovies.php">Azione</a>
                        
                    </td>

                    <td style="background-color: lightgray;">
                        <a href="FantasyMovies.php">Fantascienza</a>
                    </td>

                    <td style="background-color: lightgray;">
                        <a href="poliziesco.php">Poliziesco</a>
                    </td>

                    <td style="background-color: lightgray;">
                        <a href="storico.php">Storico</a>
                    </td>

                    <td style="background-color: lightgray;">
                        <a href="thriller.php">Thriller</a>
                    </td>

                    <td style="background-color: lightgreen;">
                        <a href="mysql.aggiuntaMovie.php">Aggiungi movie</a>
                    </td>

                    <td style="background-color: lightgreen;">
                        <a href="mysql.listaUtenti.php">Lista utenti</a>
                    </td>
                    <td style="background-color: white;">
                        <a href="zonaPagamenti.php">
                            <img src="loghi/cartLogo.png" alt="cart logo" height="20" />
                        </a>
                    </td>
                </tr>    
            </tbody>
        </table>
</form>
<?php
        break;

    // If no match is found
        default:
?>
        <p>Errore nel sistema!</p>

<?php
    } // chiude lo switch
} // chiude l'else
?>