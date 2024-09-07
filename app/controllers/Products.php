<?php

defined('ROOTPATH') OR exit('Access Denied!');

class Products
{
    use Controller;
    
    public function index()
    {
        $this->view('products');
    }
}