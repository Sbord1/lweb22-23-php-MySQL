Secondo Homework: PHP - MySQL
---------------------------------------------------
Componenti del gruppo:
- Francesco Sbordone
- Riccardo Tuzzolino
---------------------------------------------------
Indirizzo delle repository su Github:
https://github.com/sbord1/lweb22-23-php-MySQL.git (Sbordone Francesco)
https://github.com/tuzzo18/lweb22-23-php-MySQL.git (Tuzzolino Riccardo)
------------------------------------------------------------------------------------------------------------------------------------------
Funzionamento dell'applicazione

L'applicazione php che gestisce una base di dati è stata realizzata prendendo ispirazione dagli esercizi "carrello.della.spesa2"
e "carrello.della.spesa3".

La pagina "index.php" rappresenta la pagina iniziale del sito.
A partire da questa è possibile effettuare il login oppure registrarsi cliccando sulle icone in alto a destra.
Dopo aver effettuato il login è possibile fare il logout sempre tramite la pagina "index.php" cliccando l'icona in alto a destra.

Dopo aver eseguito lo script "install.php" che crea e popola la base di dati, saranno disponibili 3 utenti:
- utente "ric" con password "ric" di tipologia "user"
- utente "fra" con password "fra" di tipologia "user"
- utente "amministratore" con password "amministratore" di tipologia "admin"

Gli utenti "user" sono clienti dello store, che sono registrati nel database e che quindi posso effettuare gli acquisti
aggiungendo i film disponibili nel carrello (cliccando sulla copertina del film).

Se un utente non e' registrato può comunque visitare normalmente il sito e visionare i vari film disponibili per ogni categoria
ma non potrà effettuare acquisti. Infatti, se proverà a cliccare sulla copertina di un film verrà reindirizzato alla pagina di login.
Alternativamente, vi e' la possibilità di registrarsi nel database, direttamente dal sito, inserendo username e password.

L'utente "admin", invece, è un utente privilegiato in grado di effettuare 2 operazioni "speciali" tramite 2 nuove voci nel menu iniziale:
- Visionare la lista di utenti registrati nel database
- Aggiungere direttamente dal sito un nuovo film specificando titolo, categoria, prezzo e caricando anche un'immagine per il film.
(In locandine/azione è presente il file "morbius.jpg" che può essere caricato per testare tale funzione)

------------------------------------------------------------------------------------------------------------------------------------------
Spiegazione file e directory


- Cartella "loghi": contiene tutte le icone utilizzate

- Cartella "locandine": contiene le varie locandine dei film suddivise per categoria

- "install.php": script che crea il database ed effettua gli inserimenti
N.B. Il file "connection.php" non è incluso perchè il database ancora non è stato creato

- "connection.php": script che effettua la connessione al database (è incluso nei vari script che si collegano al database)

- "index.php": pagina inziale

- "menuConSwitch.php": e' incluso in index.php e mostra la pagina inziale in modo differente a seconda se il login
è stato effettuato e, in caso positivo, controllando la tipologia dell'utente loggato (user o admin)

- Script per il login/logout:
"loginPage.html"
"login.php"
"logout.php"

- "registrazione.php": script per permettere ad un cliente di registrarsi

- Script per la creazione dinamica della pagina contenente i film della relativa categoria:
"ActionMovies.php"
"AdventureMovies.php"
"FantasyMovies.php"
"poliziesco.php"
"storico.php"
"thriller.php"

- Operazioni privilegiate per l'amministratore:
"mysql.listaUtenti.php"
"mysql.aggiuntaMovie.php"

- Script per la fase di acquisto e pagamento:
"aggiungiCarrello.php"
"zonaPagamenti.php"
"decisione.php"

- "stileInterno.php": codice CSS
















