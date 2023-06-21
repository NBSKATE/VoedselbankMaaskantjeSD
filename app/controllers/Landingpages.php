<?php

class Landingpages extends Controller
{
    public function index()
    {
        $data = [
            'title' => '          Homepage voedselbank maaskantje'
        ];
        $this->view('landingpages/index', $data);
    }
}
