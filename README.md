# SQL Injection Demo Labs

Laboratori pratici per imparare le tecniche di SQL Injection, in ordine crescente di difficoltà.

## Requisiti

- [Docker](https://docs.docker.com/get-docker/) installato e in esecuzione

---

## Come avviare un lab

```bash
cd lab_<N>_docker
docker build -t lab<N> .
docker run --rm -p 80:80 lab<N>
```

Apri il browser su **http://localhost**. `CTRL+C` ferma e rimuove il container.

### Script wrapper

```bash
./run_lab.sh <N>   # N = 0, 1, 2 oppure 3
```

---

## Lab 0 — Bypass dell'autenticazione

L'applicazione espone un form di login. Esiste un solo utente nel database.

**Obiettivo:** accedere all'area riservata senza conoscere le credenziali.

```bash
cd lab_0_docker && docker build -t lab0 . && docker run --rm -p 80:80 lab0
```

---

## Lab 1 — Data Exfiltration

L'applicazione permette di cercare prodotti per ID. Nel database è presente anche una tabella con le credenziali degli utenti.

**Obiettivo:** recuperare le credenziali e autenticarsi nell'area riservata.

```bash
cd lab_1_docker && docker build -t lab1 . && docker run --rm -p 80:80 lab1
```

---

## Lab 2 — Data Exfiltration (tabella nascosta)

Come il Lab 1, ma il nome della tabella contenente le credenziali non è noto.

**Obiettivo:** scoprire il nome della tabella, recuperare le credenziali e autenticarsi.

```bash
cd lab_2_docker && docker build -t lab2 . && docker run --rm -p 80:80 lab2
```

---

## Lab 3 — Data Exfiltration (tabella e colonne nascoste)

Come il Lab 2, ma anche i nomi delle colonne sono sconosciuti.

**Obiettivo:** scoprire nome della tabella e delle colonne, recuperare le credenziali e autenticarsi.

```bash
cd lab_3_docker && docker build -t lab3 . && docker run --rm -p 80:80 lab3
```
