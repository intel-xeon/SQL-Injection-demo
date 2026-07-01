# SQL Injection Demo Labs

Laboratori pratici per imparare le tecniche di SQL Injection, da zero a scenari realistici con contromisure di base.

Ogni lab è un container Docker **self-contained** (PHP + Apache + MariaDB) esposto sulla porta 80. Si avvia con due comandi e si distrugge con CTRL+C.

---

## Requisiti

- [Docker](https://docs.docker.com/get-docker/) installato e in esecuzione

---

## Avvio rapido

### Script wrapper (consigliato)

```bash
./run_lab.sh <numero>   # 0, 1, 2 oppure 3
```

### Manuale

```bash
cd lab_<N>_docker
docker build -t lab<N> .
docker run --rm -p 80:80 lab<N>
```

Apri il browser su **http://localhost**. CTRL+C ferma e rimuove il container.

---

## Lab 0 — Bypass dell'autenticazione

**Obiettivo:** accedere all'area riservata senza conoscere le credenziali.

Il form di login costruisce la query in modo vulnerabile:

```sql
SELECT * FROM utenti WHERE utente='INPUT' AND password='INPUT'
```

Non viene usato nessun prepared statement. È sufficiente manipolare l'input per cortocircuitare la condizione WHERE.

```bash
cd lab_0_docker
docker build -t lab0 .
docker run --rm -p 80:80 lab0
```

---

## Lab 1 — Data Exfiltration (tabella nota)

**Obiettivo:** estrarre le credenziali dalla tabella `utenti` e autenticarsi.

L'applicazione espone una funzione di ricerca prodotti vulnerabile a UNION-based injection:

```sql
SELECT prodotto, descrizione FROM prodotti WHERE id=INPUT
```

Il database contiene anche una tabella `utenti` con colonne `user` e `password`. Il form di login usa prepared statement (sicuro): bisogna prima esfiltrare le credenziali tramite la ricerca prodotti e poi usarle per autenticarsi.

```bash
cd lab_1_docker
docker build -t lab1 .
docker run --rm -p 80:80 lab1
```

---

## Lab 2 — Data Exfiltration (tabella nascosta)

**Obiettivo:** scoprire il nome della tabella utenti e poi estrarne le credenziali.

Identico al Lab 1, ma la tabella degli utenti ha un nome offuscato (non è `utenti`). Bisogna prima interrogare `information_schema` per scoprire il nome reale della tabella, poi esfiltrare i dati.

Riferimento utile: [PortSwigger SQL Injection Cheat Sheet](https://portswigger.net/web-security/sql-injection/cheat-sheet) — sezione *Database contents* per MySQL.

```bash
cd lab_2_docker
docker build -t lab2 .
docker run --rm -p 80:80 lab2
```

---

## Lab 3 — Data Exfiltration (tabella e colonne nascoste)

**Obiettivo:** scoprire nome della tabella E delle colonne, poi estrarne le credenziali.

Come il Lab 2, ma sia il nome della tabella che i nomi delle colonne sono offuscati. Richiede due query su `information_schema`: una per le tabelle, una per le colonne.

```bash
cd lab_3_docker
docker build -t lab3 .
docker run --rm -p 80:80 lab3
```

---

## Protezione Anti-Sqlmap

Tutti i lab bloccano le richieste con `sqlmap` nello User-Agent HTTP con una risposta **403 Forbidden**.

```
# Bloccato
sqlmap -u "http://localhost/view.php?prodotto=1"

# Bypassato — basta cambiare lo User-Agent
sqlmap -u "http://localhost/view.php?prodotto=1" --user-agent="Mozilla/5.0"
sqlmap -u "http://localhost/view.php?prodotto=1" --random-agent
```

Il blocco è intenzionalmente banale: l'obiettivo è far capire che i WAF basati su User-Agent sono facilmente aggirabili.

---

## Struttura del progetto

```
SQL-Injection-demo/
├── run_lab.sh              # Script wrapper per avviare qualsiasi lab
├── lab_0_docker/
│   ├── Dockerfile
│   ├── init.sql            # Schema e dati del database
│   ├── start.sh            # Avvia MariaDB + Apache nel container
│   └── www/
│       ├── .htaccess       # Blocco User-Agent sqlmap (403)
│       ├── index.php
│       └── login.php
├── lab_1_docker/  ...
├── lab_2_docker/  ...
└── lab_3_docker/  ...
```

---

## Progressione consigliata

| Lab | Tecnica richiesta |
|-----|-------------------|
| 0 | OR injection / commento SQL |
| 1 | UNION SELECT — numero colonne, tipo dati |
| 2 | UNION + `information_schema.tables` |
| 3 | UNION + `information_schema.tables` + `information_schema.columns` |
