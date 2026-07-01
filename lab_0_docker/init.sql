CREATE TABLE IF NOT EXISTS utenti (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    utente   VARCHAR(50),
    password VARCHAR(50)
);
INSERT INTO utenti (utente, password) VALUES ('admin', 'SuperSecret123!');
