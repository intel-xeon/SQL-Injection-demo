#!/bin/bash
# Uso: ./run_lab.sh <numero_lab>   (0, 1, 2 oppure 3)
# Costruisce l'immagine ed espone il lab su http://localhost (porta 80).
# CTRL+C ferma e rimuove automaticamente il container.

LAB=$1

if [ -z "$LAB" ]; then
    echo "Uso: $0 <numero_lab>"
    echo "  Lab disponibili: 0, 1, 2, 3, 4"
    exit 1
fi

DIR="lab_${LAB}_docker"

if [ ! -d "$DIR" ]; then
    echo "Errore: directory '$DIR' non trovata."
    echo "  Lab disponibili: 0, 1, 2, 3, 4"
    exit 1
fi

echo "==========================================="
echo "  Costruzione Lab $LAB..."
echo "==========================================="
docker build -t "lab${LAB}" "$DIR"

echo ""
echo "==========================================="
echo "  Avvio Lab $LAB su http://localhost"
echo "  CTRL+C per fermare e distruggere"
echo "==========================================="
docker run --rm -p 80:80 "lab${LAB}"
