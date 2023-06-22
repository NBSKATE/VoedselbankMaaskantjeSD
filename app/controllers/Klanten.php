<?php

class Klanten extends Controller
{
    private $klantenModel;

    public function __construct()
    {
        // We create an instance of the model class and assign it to $voedselpakketModel
        $this->klantenModel = $this->model('KlantenModel');
    }

    public function index()
{
    $records = $this->klantenModel->getKlanten();

    $rows = '';
    foreach ($records as $items) {
        $isVertegenwoordig = ($items->Voornaam != '') ? $items->Voornaam . ' ' . $items->Tuusenvoegsel . ' ' . $items->Achternaam : '';
        $isVertegenwoordigCell = ($isVertegenwoordig != '') ? "<td>$isVertegenwoordig</td>" : '';
        $rows .= "<tr>
                    <td>$items->Naam</td>
                    <td>$isVertegenwoordig</td>
                    <td>$items->Email</td>
                    <td>$items->Mobiel</td>
                    <td>$items->Straat $items->Huisnummer $items->Toevoeging</td>
                    <td>$items->Woonplaats</td>
                    <td><a href='" . URLROOT . "/klanten/details/$items->persoonId'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                    </svg></a></td>
                  </tr>";
    }

    $data = [
        'title' => "Overzicht klanten",
        'rows' => $rows,
        'naam' => $items->Naam,
    ];
    $this->view('klanten/index', $data);
}

public function details($persoonId)
{
    $records = $this->klantenModel->getKlantenId();

    $rows = '';
    foreach ($records as $items) {
        $rows .= "<tr>
                    <td>$items->Voornaam</td>
                    <td>$items->Tuusenvoegsel</td>
                    <td>$items->Achternaam</td>
                    <td>$items->Geboortedatum</td>
                    <td>$items->TypePersoon</td>
                    <td>$items->Vertegenwoordiger</td>
                    <td>$items->Straatnaam</td>
                    <td>$items->Huisnummer</td>
                    <td>$items->Toevoeging</td>
                    <td>$items->Postcode</td>
                    <td>$items->Woonplaats</td>
                    <td>$items->Email</td>
                    <td>$items->Mobiel</td>
                  </tr>";
    }

    $data = [
        'title' => "Klanten Details",
    ];
    $this->view('klanten/details', $data);
}


    public function create()
{
    // Voeg hier eventuele logica toe die nodig is voor het aanmaken van een voedselpakket

    // Voorbeeld: Vervang dit met de juiste logica om gegevens voor $rows op te halen
    $records = $this->klantenModel->getKlanten();

    $rows = '';

    foreach ($records as $items) {
        $rows .= "<tr>
                    <td>$items->Naam</td>
                    <td>$items->IsVertegenwoordig</td>
                    <td>$items->Email</td>
                    <td>$items->Mobiel</td>
                    <td>$items->Straat $items->Huisnummer $items->Toevoeging, $items->Postcode</td>
                    <td>$items->Woonplaats</td>
                    <td><a href='" . URLROOT . "/klanten/update/$items->Id'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                        </svg></a></td>
                  </tr>";
    }
    $data = [
        'title' => "Voedselpakketten aanmaken",
        'rows' => $rows
    ];
    $this->view('klanten/create', $data);
}
}
