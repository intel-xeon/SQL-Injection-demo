#!/bin/bash
set -e

# Risolve 'db' come localhost so PHP ci si connette via TCP
echo "127.0.0.1 db" >> /etc/hosts

# Directory richiesta da MariaDB
mkdir -p /var/run/mysqld
chown mysql:mysql /var/run/mysqld

# Inizializza il data directory se non esiste
if [ ! -d "/var/lib/mysql/mysql" ]; then
    echo "Inizializzazione MariaDB..."
    mysql_install_db --user=mysql --datadir=/var/lib/mysql >/dev/null 2>&1
fi

# Avvia MariaDB in background
mysqld_safe --user=mysql >/dev/null 2>&1 &

# Aspetta che MariaDB sia pronto
echo "Attendo il database..."
for i in $(seq 1 60); do
    if mysqladmin ping --silent 2>/dev/null; then
        break
    fi
    sleep 1
done

# Crea utente root accessibile via TCP (wildcard %) e il database.
# Con skip-name-resolve attivo, le connessioni TCP da 127.0.0.1 non vengono
# risolte in 'localhost', quindi root@% le intercetta correttamente.
mysql -uroot <<'EOF'
CREATE USER IF NOT EXISTS 'root'@'%' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;
CREATE DATABASE IF NOT EXISTS SQLI_Exercise;
FLUSH PRIVILEGES;
EOF

# Importa le tabelle e i dati del lab
mysql -uroot SQLI_Exercise < /init.sql

echo ""
echo "============================================"
echo "  Lab pronto! Apri http://localhost"
echo "  Premi CTRL+C per fermare e rimuovere"
echo "============================================"
echo ""

exec apache2-foreground
