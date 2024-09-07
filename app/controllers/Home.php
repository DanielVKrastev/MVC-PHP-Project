<?php

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/*Home class*/
class Home
{
    use MainController;
    

    public function index()
    {
        
        $user = new \Model\User;
        $this->view('home');
    }

}
