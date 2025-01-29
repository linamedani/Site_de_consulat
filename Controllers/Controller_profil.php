<?php



class Controller_profil extends Controller
{
    public function action_show()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $data = [
                "user_name" => $user["nom"],
                "user_prenom" => $user["prenom"],
                "user_email" => $user["email"],
                "pdf_visa_acceptation" => isset($_SESSION['pdf_visa_acceptation']) ? $_SESSION['pdf_visa_acceptation'] : null
            ];
            $this->render("profil", $data);
        } else {
            header("Location: index.php?controller=connect&action=connect");
            exit;
        }
    }

    public function action_default()
    {
        $this->action_show();
    }
}
?>




