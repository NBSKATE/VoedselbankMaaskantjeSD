<?php

class Landingpages extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Homepage Voedselbank Maaskantje'
        ];
        $this->view('landingpages/index', $data);
    }
}
