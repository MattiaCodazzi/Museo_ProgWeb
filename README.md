# 🖼️ Museo_ProgWeb

**Museo_ProgWeb** è un'applicazione web per la gestione digitale delle opere museali, sviluppata come progetto universitario per il corso di **Programmazione Web**.  
Il sistema consente l'inserimento, la modifica, la ricerca e l'esposizione virtuale delle opere, con un'interfaccia dinamica basata su **AJAX**, **PHP** e **MySQL**.

---

## 🌐 Versione online del progetto

Per visualizzare il progetto completo online, è disponibile una versione ospitata su Altervista:

👉 [https://pwproject.altervista.org/ProgettoParte1/Museo/struttura/public/main.html](https://pwproject.altervista.org/ProgettoParte1/Museo/struttura/public/main.html)

Da questo link è possibile accedere all’interfaccia principale del sito, visitare tutte le pagine e testare direttamente tutte le funzionalità implementate, comprese le operazioni CRUD sulle opere del museo.




## 🚀 Avvio in locale (con XAMPP)

### 1. Clona la repository
```bash
git clone https://github.com/tuo-username/Museo_ProgWeb.git
```

### 2. Installa XAMPP
Scarica e installa XAMPP da:  
👉 [https://www.apachefriends.org](https://www.apachefriends.org)

### 3. Avvia Apache e MySQL
- Apri **XAMPP Control Panel**
- Clicca su **"Start"** accanto a **Apache** e **MySQL**
- Entrambi devono diventare **verdi**

### 4. Sposta il progetto nella cartella corretta
Sposta la cartella del progetto in:
```
C:\xampp\htdocs\ProgettoParte1\
```

### 5. Crea il database con phpMyAdmin
- Vai su [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
- Clicca su **"Nuovo"** → crea un database chiamato:
  ```
  museo
  ```

### 6. Importa la struttura e i dati
- Seleziona il database `museo`
- Vai su **"Importa"**
- Carica i seguenti file (nell’ordine):
  1. `creazione_tabelle.sql`
  2. `popolamento_museo.sql`
- Poi visita:
  ```
  http://localhost/ProgettoParte1/Museo/Generatore/genera_personale.php
  ```
  - Copia il contenuto SQL generato
  - Torna su phpMyAdmin → seleziona `museo` → scheda **SQL** → incolla → **Esegui**

> ⚠️ Crea anche la tabella `utenti` (puoi farlo da interfaccia o via script, se previsto).

### 7. Avvia l’applicazione dal browser
Esegui una delle seguenti URL:
- [http://localhost/ProgettoParte1/Museo/struttura/public/main.html](http://localhost/ProgettoParte1/Museo/struttura/public/main.html)
- [http://localhost/ProgettoParte1/Museo/aggiungi_opera.html](http://localhost/ProgettoParte1/Museo/aggiungi_opera.html)
- [http://localhost/ProgettoParte1/Museo/cerca_opera.html](http://localhost/ProgettoParte1/Museo/cerca_opera.html)

> ⚠️ **Non aprire i file HTML con doppio clic!**  
> L'applicazione funziona solo passando dal server Apache (localhost), altrimenti il codice PHP non verrà eseguito.

---

## ℹ️ Perché usare Apache?

PHP è un linguaggio lato server:  
solo Apache (o un altro web server) può interpretarlo e generare pagine HTML dinamiche.

- ✅ In locale: XAMPP fornisce Apache + MySQL
- ✅ In produzione (es. su Altervista): il server esegue già Apache

---

## 🧰 Tecnologie utilizzate

| Linguaggio / Tool      | Utilizzo                        |
|------------------------|----------------------------------|
| **HTML, CSS**          | Struttura e stile delle pagine  |
| **JavaScript, jQuery** | Interattività lato client        |
| **AJAX**               | Comunicazione asincrona con PHP |
| **PHP**                | Logica server e accesso DB      |
| **MySQL**              | Database relazionale            |
| **XAMPP**              | Server locale completo          |
| **phpMyAdmin**         | Interfaccia per la gestione DB  |

---

## 🧑‍💻 Autori

- Codazzi Mattia
- Cattaldo Andrea
