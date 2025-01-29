<?php

class Model
{
    /**
     * Attribut contenant l'instance PDO
     */
    private $bd;

    /**
     * Attribut statique qui contiendra l'unique instance de Model
     */
    private static $instance = null;

    /**
     * Constructeur : effectue la connexion à la base de données.
     */
    private function __construct()
    {
        // Inclure les informations de connexion à la base de données depuis le fichier 'credentials.php'
        include "Utils/credentials.php";

        // Connexion à la base de données PostgreSQL
        $this->bd = new PDO($dsn, $login, $mdp);
        
        // Gérer les erreurs PDO
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Définir le jeu de caractères UTF-8 pour la connexion
        $this->bd->query("SET NAMES 'utf8'");
    }

    /**
     * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
     */
    public static function getModel()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Vérifie si un utilisateur existe par son email
     */
    public function userExist($email)
    {
        $query = "SELECT * FROM utilisateur WHERE email = :email";
        $stmt = $this->bd->prepare($query);  // Utiliser $this->bd ici pour la connexion PDO
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;  // Retourne true si l'utilisateur existe, sinon false
    }

    /**
     * Insère un nouvel utilisateur dans la base de données
     */
    public function insertUser($nom, $prenom, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);  // Hacher le mot de passe
        $query = "INSERT INTO utilisateur (nom, prenom, email, motdepasse) VALUES (:nom, :prenom, :email, :motdepasse)";
        $stmt = $this->bd->prepare($query);  // Utiliser $this->bd ici pour la connexion PDO
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':motdepasse', $hashedPassword);
        $stmt->execute();
    }
     // Vérifie si l'utilisateur existe par son email
     public function getUserByEmail($email) {
        $query = "SELECT * FROM utilisateur WHERE email = :email";
        $stmt = $this->bd->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Retourner l'utilisateur trouvé ou false si aucun utilisateur n'est trouvé
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Nouvelle méthode getDb pour accéder à la connexion PDO
    public function getDb()
    {
        return $this->bd;
    }

    public function saveMessage($name, $email, $subject, $message) {
        $db = Model::getModel()->getDb();
    
        $sql = "INSERT INTO messages (name, email, subject, message, created_at) VALUES (:name, :email, :subject, :message, NOW())";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':subject' => $subject,
            ':message' => $message
        ]);
    }
    public function saveVisaApplication($nom, $prenom, $email, $nationalite, $num_passeport, $date_validite, $date_creation, $delete_account, $payment)
    {
        $query = "INSERT INTO demandes_visa (nom, prenom, email, nationalite, num_passeport, date_validite, date_creation, delete_account, payment) 
                  VALUES (:nom, :prenom, :email, :nationalite, :num_passeport, :date_validite, :date_creation, :delete_account, :payment)";
        $stmt = $this->bd->prepare($query);
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':nationalite' => $nationalite,
            ':num_passeport' => $num_passeport,
            ':date_validite' => $date_validite,
            ':date_creation' => $date_creation,
            ':delete_account' => $delete_account,
            ':payment' => $payment
        ]);
    }
}
?>
