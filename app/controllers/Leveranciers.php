<?php

class Leveranciers extends Controller
{
    private $leverancierModel;

    public function __construct()
    {
        // We maken een object van de model class en stoppen dit in een $leverancierModel
        $this->leverancierModel = $this->model('Leverancier');
    }


    public function index()
    {
        $result = $this->leverancierModel->getLeveranciers();

        $rows = "";

        foreach ($result as $leverancierInfo) {
            $rows .= "<tr>
                        <td>{$leverancierInfo->Bedrijfsnaam}</td>
                        <td>{$leverancierInfo->Straatnaam}</td>
                        <td>{$leverancierInfo->Huisnummer}</td>
                        <td>{$leverancierInfo->Toevoeging}</td>
                        <td>{$leverancierInfo->Postcode}</td>
                        <td>{$leverancierInfo->Plaats}</td>
                        <td>{$leverancierInfo->Telefoon}</td>
                        <td>{$leverancierInfo->Email}</td>
                      </tr>";
        }

        $data = [
            'title' => 'Overzicht leveranciers',
            'rows' => $rows
        ];

        $this->view('leverancier/index', $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the form data
            $leverancierData = [
                'bedrijfsnaam' => $_POST['bedrijfsnaam'],
                'adres' => $_POST['adres'],
                'contactpersoon' => $_POST['contactpersoon'],
                'email' => $_POST['email'],
                'telefoonnummer' => $_POST['telefoonnummer'],
                'eerstvolgendeLevering' => $_POST['eerstvolgendeLevering']
            ];

            // Add the new leverancier using the model
            $added = $this->leverancierModel->addLeverancier($leverancierData);

            if ($added) {
                // Success message
                echo "Leverancier toegevoegd!";
            } else {
                // Error message
                echo "Fout bij toevoegen van leverancier.";
            }
        } else {
            // Display the create leverancier form
            $this->view('leverancier/create', $data);
        }
    }
}