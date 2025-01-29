CREATE TABLE utilisateur (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,  -- Empêche les doublons d'email
    motdepasse VARCHAR(255) NOT NULL,  -- Stocker le mot de passe de manière sécurisée (voir Remarque ci-dessous)
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Date d'inscription par défaut à la date actuelle
);
CREATE TABLE messages (
    id SERIAL PRIMARY KEY, -- Utilisez SERIAL pour auto-incrémenter
    name VARCHAR(255) NOT NULL, -- Nom de l'expéditeur
    email VARCHAR(255) NOT NULL, -- Email de l'expéditeur
    subject VARCHAR(255) NOT NULL, -- Sujet du message
    message TEXT NOT NULL, -- Corps du message
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Date et heure de l'envoi du message
);

