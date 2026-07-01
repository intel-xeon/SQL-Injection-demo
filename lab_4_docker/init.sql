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

CREATE TABLE IF NOT EXISTS acc_t7vn2kqx (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    usr_hP5mW3r VARCHAR(50),
    pwd_jL8xB6s VARCHAR(50)
);
INSERT INTO acc_t7vn2kqx (usr_hP5mW3r, pwd_jL8xB6s) VALUES ('admin', 'S3cr3tP4ss!');
