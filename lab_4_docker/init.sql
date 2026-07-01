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
-- password in chiaro: "monkey"  (SHA224)
INSERT INTO acc_t7vn2kqx (usr_hP5mW3r, pwd_jL8xB6s) VALUES ('admin', '87b9b78c17428a74195ae419b3d347c382393fade9f3c9369fcb2117');
