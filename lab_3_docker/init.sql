CREATE TABLE IF NOT EXISTS prodotti (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    prodotto    VARCHAR(100),
    descrizione TEXT
);
INSERT INTO prodotti (prodotto, descrizione) VALUES
    ('Laptop',    'Potente laptop per professionisti'),
    ('Mouse',     'Mouse ergonomico wireless'),
    ('Tastiera',  'Tastiera meccanica retroilluminata'),
    ('Monitor',   'Monitor 4K da 27 pollici');

CREATE TABLE IF NOT EXISTS utenti_fjku506t (
    id               INT AUTO_INCREMENT PRIMARY KEY,
    utenza_1K98d1q   VARCHAR(50),
    password_i64G3wN VARCHAR(50)
);
INSERT INTO utenti_fjku506t (utenza_1K98d1q, password_i64G3wN) VALUES ('admin', 'ObfuscatedPass!');
