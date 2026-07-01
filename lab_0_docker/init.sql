CREATE TABLE IF NOT EXISTS utenti (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    utente   VARCHAR(50),
    password VARCHAR(50)
);
-- password in chiaro: "password"  (SHA1)
INSERT INTO utenti (utente, password) VALUES ('admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');
