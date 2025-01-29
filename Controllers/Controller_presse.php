<?php

class Controller_presse extends Controller
{
    public function action_presse(){
       $data=[];
        $this->render("presse", $data);
    }
    
    public function action_default()
    {
        $this->action_presse();
    }

}
