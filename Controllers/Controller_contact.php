<?php 

class Controller_contact extends Controller
{
    public function action_default() {
        // Par défaut, afficher le formulaire de contact
        $this->render("contact");
    }

    public function action_sendMessage() {
        // Récupérer les informations du formulaire
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        $messageResponse = "";

        // Validation simple
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            $messageResponse = "Tous les champs doivent être remplis.";
        } else {
            // Sauvegarder le message dans la base de données
            $model = Model::getModel('Model_contact');
            $model->saveMessage($name, $email, $subject, $message);

            // Simuler l'envoi d'email en définissant directement le message de succès
            $messageResponse = "Votre message a été envoyé avec succès!";
        }

        // Passer le message de succès ou d'erreur à la vue
        $this->render("contact", ['message' => $messageResponse]);
    }
}
?>
