<?php

class Leveranciers extends Controller
{
    //properties
    private $leverancierModel;

    // Dit is de constructor van de controller
    public function __construct()
    {
        $this->leverancierModel = $this->model('Leverancier');
    }

    public function index()
    {
        $records = $this->leverancierModel->getLeveranciers();


        $rows = '';

        foreach ($records as $items) {
            $rows .= "<tr>
                        <td>$items->Naam</td>
                        <td>$items->ContactPersoon</td>
                        <td>$items->Email</td>
                        <td>$items->Mobiel</td>
                        <td>$items->LeverancierNummer</td>
                        <td>$items->LeverancierType</td>
                        
                        <td>
                            <a href='" . URLROOT . "/leveranciers/productDetails/$items->Id'>Product Details</a>
                        </td>                       
                      </tr>";
        }

        $data = [
            'title' => "Overzicht leveranciers",
            'rows' => $rows
        ];
        $this->view('leveranciers/index', $data);
    }

    //
    public function productDetails()
    {
       echo"hoi";

        $data = [
            'title' => "Overzicht leveranciers",
          
        ];
        $this->view('leveranciers/productDetails', $data);
    }
    //    

    public function update($id = null)
    {
        /**
         * Controleer of er gepost wordt vanuit de view update.php
         */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /**
             * Maak het $_POST array schoon
             */
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->leverancierModel->updateLeverancier($_POST);

            header("Location: " . URLROOT . "/leverancier/index");
        }

        $record = $this->leverancierModel->getKlant($id);

        $data = [
            'title' => 'Update Leveranciers',
            'Id' => $record->Id,
            'Naam' => $record->Naam,
            'Tussenvoegsel' => $record->Tussenvoegsel,
            'Achternaam' => $record->Achternaam,
            'Volwassenen' => $record->Volwassenen,
            'Kinderen' => $record->Kinderen,
            'Babies' => $record->Babies,
        ];
        $this->view('leveranciers/update', $data);
    }

    // public function delete($id)
    // {
    //     $result = $this->leverancierModel->deleteKlant($id);
    //     if ($result) {
    //         echo "Het record is verwijderd uit de database";
    //         header("Refresh: 3; URL=" . URLROOT . "/leveranciers/index");
    //     } else {
    //         echo "Internal servererror, het record is niet verwijderd";
    //         header("Refresh: 3; URL=" . URLROOT . "/leveranciers/index");
    //     }
    // }

    // public function create()
    // {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         // $_POST array schoonmaken
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //         $result = $this->leverancierModel->createKlant($_POST);

    //         if ($result) {
    //             echo "Het invoeren is gelukt";
    //             header("Refresh:3; URL=" . URLROOT . "/klanten/index");
    //         } else {
    //             echo "Het invoeren is NIET gelukt";
    //             header("Refresh:3; URL=" . URLROOT . "/klanten/index");
    //         }
    //     }

    //     $data = [
    //         'title' => 'Voeg een nieuw klant toe'
    //     ];
    //     $this->view('klanten/create', $data);
    // }
}
