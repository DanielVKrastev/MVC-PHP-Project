<?php

class Home extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $model = new Model;

        $arr['name'] = 'Marry';
        $arr['age'] = 50;

        $result = $model->update(2, $arr);
        
        show($result);

        $this->view('home');
    }
}
