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

CREATE TABLE IF NOT EXISTS utenti (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    user     VARCHAR(50),
    password VARCHAR(50)
);
-- password in chiaro: "123456"  (SHA256)
INSERT INTO utenti (user, password) VALUES ('admin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');
