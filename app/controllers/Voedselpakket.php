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
                        <td>$items->Id</td>
                        <td>$items->Naam</td>
                        <td>$items->Tussenvoegsel</td>
                        <td>$items->Achternaam</td>
                        <td>$items->Volwassenen</td>
                        <td>$items->Kinderen</td>
                        <td>$items->Babies</td>
                        <td>$items->Telefoon</td>
                        <td>$items->Email</td>
                        <td>$items->Straatnaam</td>
                        <td>$items->Huisnummer</td>
                        <td>$items->Toevoeging</td>
                        <td>$items->Postcode</td>
                        <td>$items->Plaats</td>

                        <td>
                            <a href='" . URLROOT . "/voedselpakket/update/$items->Id'>update</a>
                        </td>
                        <td>
                            <a href='" . URLROOT . "/voedselpakket/delete/$items->Id'>delete</a>
                        </td>
                      </tr>";
        }

        $data = [
            'title' => "Overzicht voedselpakketten",
            'rows' => $rows
        ];
        $this->view('voedselpakket/index', $data);


    }

    public function create()
{
    // Voeg hier eventuele logica toe die nodig is voor het aanmaken van een voedselpakket

    // Voorbeeld: Vervang dit met de juiste logica om gegevens voor $rows op te halen
    $records = $this->voedselpakketModel->getVoedselpakket();

    $rows = '';

    foreach ($records as $items) {
        // Bouw de rijen op zoals je eerder hebt gedaan in de index-methode
        $rows .= "<tr>
                    <td>$items->Id</td>
                    <td>$items->Naam</td>
                    <td>$items->Tussenvoegsel</td>
                    <td>$items->Achternaam</td>
                    <td>$items->Volwassenen</td>
                    <td>$items->Kinderen</td>
                    <td>$items->Babies</td>
                    <td>$items->Telefoon</td>
                    <td>$items->Email</td>
                    <td>$items->Straatnaam</td>
                    <td>$items->Huisnummer</td>
                    <td>$items->Toevoeging</td>
                    <td>$items->Postcode</td>
                    <td>$items->Plaats</td>

                    <td>
                        <a href='" . URLROOT . "/voedselpakket/update/$items->Id'>update</a>
                    </td>
                    <td>
                        <a href='" . URLROOT . "/voedselpakket/delete/$items->Id'>delete</a>
                    </td>
                  </tr>";
    }

    $data = [
        'title' => "Voedselpakketten aanmaken",
        'rows' => $rows
    ];
    $this->view('voedselpakket/create', $data);
}
}
