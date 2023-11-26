-- Table des Contacts

CREATE TABLE contacts (
    id INT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255)
);





-- Table des Adresses

CREATE TABLE addresses (
    id INT PRIMARY KEY,
    ville VARCHAR(255),
    contact_id INT,
    FOREIGN KEY (contact_id) REFERENCES contacts(id)
);