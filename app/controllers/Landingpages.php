<?php

class Landingpages extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Homepage Voedselbank Maaskantje',
            'sayHello' => 'Hallo Allemaal'
        ];
        $this->view('landingpages/index', $data);
    }
}
