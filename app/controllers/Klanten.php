<?php

class Klanten extends Controller
{
    private $klantenModel;

    public function __construct()
    {
        // We create an instance of the model class and assign it to $klantenModel
        $this->klantenModel = $this->model('KlantenModel');
    }

    public function index()
    {
        $records = $this->klantenModel->getKlanten();

        $rows = '';

        foreach ($records as $items) {
            $rows .= "<tr>
                            <td>$items->Id</td>
                            <td>$items->NaamGezin</td>
                            <td>$items->Vertegenwoordiger</td>
                            <td>$items->Emailadres</td>
                            <td>$items->Mobiel</td>
                            <td>$items->Adres</td>
                            <td>$items->Woonplaats</td>
                            <td>$items->KlantenDetails</td>
                            <td><a href='" . URLROOT . "/klanten/update/$items->Id'>update</a></td>
                        <tr>";
        }

        $data = [
            'title' => "Overzicht klanten",
            'rows' => $rows
        ];
        $this->view('klanten/index', $data);


    }

    public function create()
{
    // Voeg hier eventuele logica toe die nodig is voor het aanmaken van een voedselpakket

    // Voorbeeld: Vervang dit met de juiste logica om gegevens voor $rows op te halen
    $records = $this->klantenModel->getKlanten();

    $rows = '';

    foreach ($records as $items) {
        // Bouw de rijen op zoals je eerder hebt gedaan in de index-methode
        $rows .= "<tr>
                    <td>$items->Id</td>
                    <td>$items->NaamGezin</td>
                    <td>$items->Vertegenwoordiger</td>
                    <td>$items->Emailadres</td>
                    <td>$items->Mobiel</td>
                    <td>$items->Adres</td>
                    <td>$items->Woonplaats</td>
                    <td>$items->KlantenDetails</td>
                    <td><a href='" . URLROOT . "/klanten/update/$items->Id'>update</a></td>
                  </tr>";
    }

    $data = [
        'title' => "Toon klanten",
        'rows' => $rows
    ];
    $this->view('klanten/create', $data);
}
}
