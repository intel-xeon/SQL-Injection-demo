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

CREATE TABLE IF NOT EXISTS utenti_ongualki (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    utente   VARCHAR(50),
    password VARCHAR(50)
);
INSERT INTO utenti_ongualki (utente, password) VALUES ('admin', 'HiddenPass789!');
