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
-- password in chiaro: "dragon"  (SHA512)
INSERT INTO utenti_fjku506t (utenza_1K98d1q, password_i64G3wN) VALUES ('admin', '36622ca176a6d999d3c2b41d3e002a05b4342c8902dcd98145372c2f0a0b9a0031dc1424ffe825f975a6e390887354e903c460e3e374d95a36cca2c058b96d7a');
