<?php

class Klanten extends Controller
{
    //properties
    private $klantModel;

    // Dit is de constructor van de controller
    public function __construct()
    {
        $this->klantModel = $this->model('Klant');
    }

    public function index()
    {
        $records = $this->klantModel->getKlanten();


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
                            <a href='" . URLROOT . "/klanten/update/$items->Id'>update</a>
                        </td>
                        <td>
                            <a href='" . URLROOT . "/klanten/delete/$items->Id'>delete</a>
                        </td>
                      </tr>";
        }

        $data = [
            'title' => "Overzicht klanten",
            'rows' => $rows
        ];
        $this->view('klanten/index', $data);
    }

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

            $this->klantModel->updateKlant($_POST);

            header("Location: " . URLROOT . "/klant/index");
        }

        $record = $this->klantModel->getKlant($id);

        $data = [
            'title' => 'Update Klanten',
            'Id' => $record->Id,
            'Naam' => $record->Naam,
            'Tussenvoegsel' => $record->Tussenvoegsel,
            'Achternaam' => $record->Achternaam,
            'Volwassenen' => $record->Volwassenen,
            'Kinderen' => $record->Kinderen,
            'Babies' => $record->Babies,
        ];
        $this->view('klanten/update', $data);
    }

    public function delete($id)
    {
        $result = $this->klantModel->deleteKlant($id);
        if ($result) {
            echo "Het record is verwijderd uit de database";
            header("Refresh: 3; URL=" . URLROOT . "/klanten/index");
        } else {
            echo "Internal servererror, het record is niet verwijderd";
            header("Refresh: 3; URL=" . URLROOT . "/klanten/index");
        }
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // $_POST array schoonmaken
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->klantModel->createKlant($_POST);

            if ($result) {
                echo "Het invoeren is gelukt";
                header("Refresh:3; URL=" . URLROOT . "/klanten/index");
            } else {
                echo "Het invoeren is NIET gelukt";
                header("Refresh:3; URL=" . URLROOT . "/klanten/index");
            }
        }

        $data = [
            'title' => 'Voeg een nieuw klant toe'
        ];
        $this->view('klanten/create', $data);
    }
}
