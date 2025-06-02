# 📄 Documentazione del Progetto  
## Museo Virtuale – Progetto di Programmazione Web

### 🎯 Obiettivo del Progetto

Il progetto *Museo Virtuale* nasce con l’obiettivo di offrire un’interfaccia web semplice, intuitiva e funzionale, che permetta agli utenti di esplorare e consultare virtualmente le opere di un museo, fornendo una panoramica completa e accessibile prima di una visita fisica.

L’interfaccia è progettata per facilitare la navigazione e l’interazione sia da parte del pubblico generico che del personale del museo, differenziando le funzionalità disponibili in base al tipo di utente autenticato.

---

### 🧱 Tecnologie Utilizzate

Il progetto ha soddisfatto tutti i vincoli tecnologici previsti dal corso, facendo uso delle seguenti tecnologie:

| Tecnologia     | Utilizzo principale                           |
|----------------|-----------------------------------------------|
| **HTML**       | Struttura e markup delle pagine web           |
| **CSS**        | Layout grafico e stile dell’interfaccia       |
| **JavaScript** | Interazioni lato client, dinamismo dei contenuti |
| **jQuery**     | Facilitazione delle chiamate AJAX             |
| **AJAX**       | Comunicazione asincrona con il backend PHP    |
| **PHP**        | Logica lato server, gestione dei dati e interazione con il database |
| **MySQL**      | Gestione dati relazionali tramite phpMyAdmin su Altervista |

Il database MySQL è stato implementato e gestito tramite **phpMyAdmin**, offerto dal servizio hosting Altervista.

---

### 🗂️ Struttura del Sito

Il sito si compone di una serie di pagine collegate a un’unica pagina iniziale che funge da **login/registrazione**, punto di ingresso per l’intera applicazione. Da qui il flusso si biforca in due sezioni principali:

#### 🔐 Sezione Personale (Privilegiata)

Accessibile al personale interno del museo, il quale dispone già di un account. Dopo l'autenticazione, l’operatore può:

- Inserire nuove opere (Create)
- Visualizzare e cercare opere (Read)
- Modificare informazioni (Update)
- Rimuovere opere dal sistema (Delete)

In altre parole, ha accesso **completo a tutte le funzionalità CRUD** (Create, Read, Update, Delete) previste dall’applicazione.

#### 👤 Sezione Utente (Pubblica)

Destinata a visitatori generici interessati a consultare il patrimonio museale. Gli utenti devono:

- Registrarsi con i seguenti dati:
  - Username
  - Nome
  - Cognome
  - Password
  - Email
- Effettuare il login successivamente con le credenziali fornite

Una volta autenticati, gli utenti **non hanno accesso alle funzionalità di modifica dei dati**. Possono esclusivamente:

- Visualizzare le opere presenti
- Effettuare ricerche in base a criteri specifici (autore, tipo, sala, ecc.)

Questa separazione dei ruoli garantisce la sicurezza e l'integrità dei dati gestiti.

---

### 🔐 Gestione degli Accessi

Il sistema implementa una **logica di autenticazione e autorizzazione**, basata su sessioni PHP, che differenzia i percorsi e le funzionalità accessibili in base al tipo di utente:

- Al primo accesso, l'utente pubblico deve creare un account tramite il form di registrazione
- Il personale accede tramite credenziali predefinite (caricate nel database)
- Dopo l’autenticazione, viene rediretto alla sezione corrispondente (utente o personale)

---

### 🔄 Interazione con il Database

Le operazioni CRUD sono implementate tramite:

- **PHP** lato server per la gestione delle richieste
- **AJAX** e **jQuery** per l’invio asincrono dei dati (senza ricaricare la pagina)
- **Query MySQL** per l’interazione con il database

Sono previste validazioni lato client e lato server per garantire la correttezza e la consistenza dei dati.

---

### 🌍 Versione Online

È disponibile una versione online completamente funzionante del progetto, ospitata su Altervista:

👉 [https://pwproject.altervista.org/ProgettoParte1/Museo/struttura/public/main.html](https://pwproject.altervista.org/ProgettoParte1/Museo/struttura/public/main.html)

Da questo link è possibile accedere alla homepage dell'applicazione, esplorare tutte le sezioni del sito e provare tutte le funzionalità descritte, inclusa la registrazione utenti e la gestione CRUD delle opere.
