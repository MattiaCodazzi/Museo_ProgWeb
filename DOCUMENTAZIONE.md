# 📄 Documentazione – Progetto Museo (Prima Parte)

## 🔷 Obiettivo del Progetto

Il progetto consiste nella realizzazione di un sito web per la gestione delle opere di un museo. L’applicazione fa riferimento al database DB1 – Museo e implementa un’interfaccia coerente con il template grafico assegnato.  
Il sito consente la visualizzazione e la gestione delle opere tramite operazioni CRUD.

---

## 🖥️ Struttura del Sito

Il sito è composto da una singola sezione:

 ### Sezione Amministratore

Questa sezione permette di eseguire operazioni CRUD sulle opere del museo.  
Funzionalità principali:

- Inserimento di nuove opere (form con campi validati).
- Visualizzazione completa delle opere in una tabella.
- Ricerca per titolo, autore, tipo e sala.
- Modifica dei dati delle opere.
- Eliminazione delle opere selezionate.

Tutte le operazioni sono gestite tramite **AJAX**, con comunicazione asincrona al server PHP, che interagisce con il database.

---

## 🧰 Tecnologie Utilizzate

- **Frontend:** HTML, CSS, JavaScript, jQuery
- **Backend:** PHP
- **Comunicazione Client-Server:** AJAX + JSON
- **Database:** MongoDB *(oppure MySQL in alternativa per compatibilità hosting)*
- **Struttura Dati:** conforme al modello logico DB1 – Museo

---

## 🔄 Funzionalità Implementate

- ✅ Create: Inserimento opere
- ✅ Read: Visualizzazione e ricerca opere
- ✅ Update: Modifica opere
- ✅ Delete: Eliminazione opere
- ✅ Paginazione: per sale (10 per pagina) e temi (5 per pagina)
- ✅ Interfaccia: conforme al template assegnato nel progetto

---

## 🌐 Link al Sito Web

Una volta pubblicato il sito, inserire qui il link:  
👉 [https://pwproject.altervista.org/ProgettoParte1/Museo/struttura/public/dashboard_personale.html](https://pwproject.altervista.org/ProgettoParte1/Museo/struttura/public/dashboard_personale.html) 

---

## 📂 Contenuti del Progetto

- Tutti i file HTML, CSS, JS e PHP
- File `.zip` contenente l’intero progetto
- File .sql e .php per il popolamento del database
- Repository GitHub con:
  - Codice sorgente
  - README
  - Documentazione tecnica
- Link al sito web

---

## 📝 Note Aggiuntive

- Tutti gli stili sono centralizzati alcuni file CSS.
- I messaggi di errore e conferma sono visualizzati a schermo tramite riquadri colorati (verde per conferma, rosso per errore).
- Il sito è responsive e adatto a diverse dimensioni di schermo.
