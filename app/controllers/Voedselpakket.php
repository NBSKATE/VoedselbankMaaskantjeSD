<?php

class Voedselpakket extends Controller
{
    private $voedselpakketModel;

    public function __construct()
    {
        // We create an instance of the model class and assign it to $voedselpakketModel
        $this->voedselpakketModel = $this->model('VoedselpakketModel');
    }

    public function index()
    {
        $records = $this->voedselpakketModel->getVoedselpakket();


        $rows = '';

        foreach ($records as $items) {
            $rows .= "<tr>
                        <td>$items->Naam</td>
                        <td>$items->Omschrijving</td>
                        <td>$items->Volwassenen</td>
                        <td>$items->Kinderen</td>
                        <td>$items->Babys</td>
                        <td>$items->Vertegenwoordiger</td>
                      </tr>";
        }

        $data = [
            'title' => "Overzicht voedselpakketten",
            'rows' => $rows
        ];
        $this->view('voedselpakket/index', $data);


    }
}