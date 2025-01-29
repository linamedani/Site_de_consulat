<?php

class Controller_acceuil extends Controller
{
    public function action_acceuil(){
       $data=[];
        $this->render("acceuil", $data);
    }
    
    public function action_default()
    {
        $this->action_acceuil();
    }

}
