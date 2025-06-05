# 📄 Documentazione – Progetto Museo (Prima Parte)

## 🔷 Obiettivo del Progetto

Il progetto consiste nella realizzazione di un **sito web gestionale per i dipendenti del museo**, pensato come strumento interno per curatori, addetti alla catalogazione, tecnici e responsabili di sala. 
L'applicazione fa riferimento al database **DB1 – Museo** e implementa un’interfaccia coerente con il template grafico fornito. 

Il sistema consente di **gestire tutte le entità museali** tramite operazioni CRUD:
- Opere
- Autori
- Sale espositive
- Temi artistici

Tutte le funzionalità sono accessibili da una dashboard principale organizzata in sezioni.

---

## 🖥️ Struttura del Sito

Il sito è suddiviso in più sezioni, ognuna dedicata alla gestione di una specifica entità museale:

### Sezione Personale (Generica)
Consente l'accesso a tutte le funzionalità amministrative.

### Opere
- Inserimento di nuove opere (form con validazioni).
- Visualizzazione completa con tabella interattiva.
- Ricerca per titolo, autore, tipo e sala.
- Modifica con form a lato.
- Eliminazione.

### Autori
- Ricerca filtrata per nome, cognome, nazionalità.
- Visualizzazione tabellare con risultati paginati.
- Form di modifica laterale (con validazioni su date/tipo).

### Sale
- Visualizzazione a card (10 per pagina).
- Modifica sala tramite popup (tema + superficie).
- Pulsanti di paginazione disabilitati ai margini.

### Temi
- Visualizzazione a card con immagini e descrizione.
- Paginazione 5 per pagina.
- Popup informativi al click.

---

## 🧰 Tecnologie Utilizzate

- **Frontend:** HTML, CSS, JavaScript, jQuery
- **Backend:** PHP (procedurale)
- **Comunicazione Client-Server:** AJAX + JSON
- **Database:** MySQL *(per compatibilità hosting Altervista)*
- **Struttura dati:** conforme al modello logico DB1 – Museo

---

## 🔄 Funzionalità Implementate

- ✅ **Create**: Inserimento per tutte le entità (opere, autori, sale, temi)
- ✅ **Read**: Ricerca, filtri e visualizzazione dinamica
- ✅ **Update**: Modifica con validazioni client/server
- ✅ **Delete**: Eliminazione protetta
- ✅ **Paginazione**: Sale (10 per pagina), Temi (5 per pagina)
- ✅ **Popup**: per modifica sale e visualizzazione temi
- ✅ **Conferme visive**: messaggi dinamici colorati

---

## 🌐 Link al Sito Web

👉 Una volta pubblicato, inserire qui il link al sito web:
[https://pwproject.altervista.org/ProgettoParte1/Museo/struttura/public/dashboard_personale.html](https://pwproject.altervista.org/ProgettoParte1/Museo/struttura/public/dashboard_personale.html)

---

## 📂 Contenuti del Progetto

- Tutti i file HTML, CSS, JS, PHP organizzati per sezione
- File `.zip` dell’intero progetto
- Script `.sql` e `.php` per creazione e popolamento DB
- Repository GitHub contenente:
  - Codice sorgente
  - README
  - Documentazione

---

## 📝 Note Aggiuntive

- Tutti gli stili sono centralizzati nei file CSS.
- I messaggi di errore e conferma sono visualizzati a schermo tramite riquadri colorati (verde = successo, rosso = errore).
- L’interfaccia è responsive e adattabile a diverse risoluzioni.
- Il layout rispetta la grafica richiesta, con pulsanti, popup e card coerenti in ogni pagina.
