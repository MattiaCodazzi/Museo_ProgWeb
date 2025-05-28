# 🖼️ Museo_ProgWeb

Repository per progetto universitario **Programmazione Web**  
Web application per la gestione di opere museali, sviluppata con **HTML**, **CSS**, **JavaScript (AJAX, jQuery)**, **PHP** e **MySQL**.

---

## 🚀 Come avviare l'applicazione in locale

### 1. Clona la repository
```bash
git clone https://github.com/tuo-username/Museo_ProgWeb.git
```

### 2. Installa XAMPP
Scarica **XAMPP** (che include Apache, PHP e MySQL) da:  
👉 https://www.apachefriends.org/

### 3. Avvia Apache e MySQL
1. Apri il **XAMPP Control Panel**
2. Clicca su **"Start"** accanto ad **Apache** e **MySQL**
3. Entrambi devono diventare **verdi**

### 4. Crea il database con phpMyAdmin
1. Apri il browser e vai su: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Clicca su **"Nuovo"**
3. Crea un nuovo database chiamato:
   ```
   museo
   ```

### 5. Importa le tabelle e i dati
1. Seleziona il database `museo` in phpMyAdmin
2. Clicca su **"Importa"**
3. Importa i seguenti file **nell’ordine**:
   - `creazione_tabelle.sql`
   - `popolamento_museo.sql`

### 6. Sposta il progetto nella cartella corretta
Copia l'intera cartella del progetto clonata in:
```
C:\xampp\htdocs\
```

### 7. Avvia l'applicazione nel browser
Apri uno di questi URL nel tuo browser:
- [http://localhost/museo/main.html](http://localhost/museo/main.html)
- [http://localhost/museo/aggiungi_opera.html](http://localhost/museo/aggiungi_opera.html)
- [http://localhost/museo/cerca_opera.html](http://localhost/museo/cerca_opera.html)

> ⚠️ **Non aprire i file HTML con doppio clic!**  
> Devono essere eseguiti attraverso il server Apache (localhost), altrimenti i file PHP non funzioneranno.

---

## ❓ Perché Apache è necessario per PHP?

PHP è un linguaggio **lato server**, quindi i file `.php` **non vengono interpretati direttamente dal browser**. Serve un server web — come Apache — che:

- esegue il codice PHP,
- comunica con il database MySQL,
- restituisce al browser l’output HTML.

### In fase di sviluppo:
È necessario tenere **Apache attivo tramite XAMPP**.

### In fase di produzione (es. su Altervista):
Non è più necessario avviare Apache manualmente perché il server Altervista **include già Apache**, e i file PHP vengono eseguiti automaticamente via browser.

---

## 🧰 Tecnologie utilizzate

- ✅ HTML, CSS
- ✅ JavaScript, jQuery, AJAX
- ✅ PHP
- ✅ MySQL
- ✅ XAMPP (Apache + MySQL + PHP)
- ✅ phpMyAdmin
