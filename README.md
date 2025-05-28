# Museo_ProgWeb
Repository per progetto univeristario Programmazione Web

# 🖼️ Museo Web App – Progetto Programmazione Web

Web application per la gestione di opere museali, sviluppata con HTML, CSS, JavaScript (AJAX, jQuery), PHP e MySQL.

---

## 🚀 Come avviare l'applicazione in locale

### 1. Clona la repository
```bash
git clone https://github.com/tuo-username/nome-repo.git

Installa XAMPP
Scarica XAMPP (inclusi Apache, PHP e MySQL) da:
👉 https://www.apachefriends.org/

Avvia Apache e MySQL
Apri il XAMPP Control Panel

Clicca su "Start" accanto ad Apache e MySQL → Devono diventare verdi

Crea il database con phpMyAdmin
Vai su http://localhost/phpmyadmin

Clicca su "Nuovo" e crea un database chiamato:
museo

Importa le tabelle e i dati
Seleziona il database museo in phpMyAdmin

Clicca su "Importa"

Carica e importa nell’ordine:

creazione_tabelle.sql
popolamento_museo.sql

Sposta il progetto nella cartella corretta
Copia tutta la cartella del progetto clonata in:

C:\xampp\htdocs\

Avvia l'app nel browser
Apri uno di questi indirizzi nel browser:

http://localhost/museo/main.html
http://localhost/museo/aggiungi_opera.html
http://localhost/museo/cerca_opera.html
(!! non doppio clicco sull'html dalla cartella)

erché Apache è necessario per PHP?
PHP è un linguaggio lato server, il che significa che i file .php devono essere eseguiti da un server web (come Apache). Se provi ad aprire un file .php con doppio clic, il browser non lo interpreta correttamente.
Apache si occupa di:
interpretare i file PHP,
comunicare con il database MySQL,
restituire al browser l’output HTML.
Per questo motivo, Apache deve essere sempre attivo durante l’esecuzione dell’app.
Questo è necessario solo in fase di sviluppo infatti quando il progetto verrà migrato su Altervista che fa da hosting, il server host sarà già dotato di apache e l'utente può ottenere i contenuti semplicemente dal browser

Tecnologie utilizzate
HTML, CSS
JavaScript, jQuery, AJAX
PHP
MySQL
XAMPP (Apache + MySQL + PHP)
phpMyAdmin
