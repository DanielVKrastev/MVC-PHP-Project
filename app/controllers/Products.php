<?php

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

class Products
{
    use MainController;
    
    public function index()
    {
        $this->view('products');
    }
}