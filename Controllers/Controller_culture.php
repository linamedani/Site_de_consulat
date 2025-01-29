<?php

class Controller_culture extends Controller
{
    public function action_culture() {
        $data = [];  // Pas de données dynamiques pour cette page pour l'instant
        $this->render("culture", $data);  // Rendre la page "culture"
    }

    public function action_default() {
        $this->action_culture();  // Action par défaut pour afficher la page de culture
    }
}
?>
