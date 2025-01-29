<?php

class Controller_inscr extends Controller
{
    public function action_doInscription()
    {
        $m = Model::getModel();
        $message = "";

        // Vérifiez que le formulaire a été soumis et que les valeurs existent dans $_POST
        $nom = isset($_POST["nom"]) ? $_POST["nom"] : null;
        $prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : null;
        $email = isset($_POST["email"]) ? $_POST["email"] : null;
        $password = isset($_POST["motdepasse"]) ? $_POST["motdepasse"] : null;
        $confirmPassword = isset($_POST["confirmpassword"]) ? $_POST["confirmpassword"] : null;

        if ($nom && $prenom && $email && $password && $confirmPassword) {
            // Vérifiez si l'email est valide
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "L'email n'est pas valide.";
            }
            // Vérifiez la sécurité du mot de passe
            elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,12}$/", $password)) {
                $message = "Le mot de passe doit être entre 8 et 12 caractères, contenir une majuscule, une minuscule, un chiffre et un caractère spécial.";
            }
            // Vérifiez si les mots de passe correspondent
            elseif ($password !== $confirmPassword) {
                $message = "Les mots de passe ne correspondent pas.";
            }
            // Vérifiez si l'email existe déjà
            elseif ($m->userExist($email)) {
                $message = "Cet email est déjà utilisé. Veuillez en choisir un autre.";
            }
            // Si tout est correct, insérez l'utilisateur
            else {
                $m->insertUser($nom, $prenom, $email, $password);
                $message = "<span style='color: green;'>Inscription réussie !</span>";
            }
        } else {
            $message = "Veuillez remplir tous les champs.";
        }

        // Passez le message à la vue
        $data = [
            "message" => $message
        ];
        $this->render("inscr", $data);
    }

    public function action_default()
    {
        $this->action_doInscription();
    }
}
