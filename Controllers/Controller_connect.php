<?php

class Controller_connect extends Controller
{
    public function action_connect() {
        $data = [];
        $this->render("connect", $data); // Afficher le formulaire de connexion
    }

    public function action_doConnect() {
        // Vérifiez que les champs 'email' et 'password' existent dans $_POST
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            // Récupérer les informations du formulaire
            $email = $_POST["email"];
            $password = $_POST["password"];
            $message = "";

            // Vérifier que les champs ne sont pas vides
            if (empty($email) || empty($password)) {
                $message = "Tous les champs doivent être remplis.";
            } else {
                // Obtenir l'instance du modèle
                $m = Model::getModel();

                // Vérifier si l'email existe dans la base de données
                $user = $m->getUserByEmail($email);
                if ($user) {
                    // Vérifier si le mot de passe est correct
                    if (password_verify($password, $user["motdepasse"])) {
                        // Si l'authentification réussit, démarrez une session et redirigez
                        session_start();
                        $_SESSION['user'] = $user;
                        $_SESSION["user_id"] = $user["id"];
                        $_SESSION["user_email"] = $user["email"];
                        $_SESSION["user_name"] = $user["nom"];
                        $_SESSION["user_prenom"] = $user["prenom"];

                        // Rediriger vers la page de profil après la connexion
                        header("Location: index.php?controller=profil&action=show");
                        exit;
                    } else {
                        $message = "Le mot de passe est incorrect.";
                    }
                } else {
                    $message = "Vous n'êtes pas encore inscrit. Veuillez d'abord vous inscrire.";
                }
            }
        } else {
            $message = "Tous les champs doivent être remplis.";
        }

        // Afficher un message d'erreur ou de succès
        $data = [
            "message" => $message
        ];
        $this->render("connect", $data); // Rendre à nouveau le formulaire avec le message
    }

    public function action_default() {
        $this->action_connect(); // Action par défaut pour afficher le formulaire de connexion
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?controller=acceuil&action=acceuil');
        exit;
    }
}

?>
