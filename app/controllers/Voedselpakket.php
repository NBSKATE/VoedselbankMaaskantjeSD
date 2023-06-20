<?php

class Voedselpakket extends Controller
{
    //properties
    private $voedselpakketModel;

    // This is the constructor of the controller
    public function __construct() 
    {
        $this->voedselpakketModel = $this->model('Voedselpakket');
    }

    public function index($land = 'Nederland', $age = 67)
    {
        $records = $this->voedselpakketModel->getVoedselpakket();
        //var_dump($records);

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->Id</td>
                        <td>$items->Name</td>
                        <td>$items->CapitalCity</td>
                        <td>$items->Continent</td>
                        <td>$items->Population</td>
                        <td>
                            <a href='" . URLROOT . "/voedselpakket/update/$items->Id'>update</a>
                        </td>
                        <td>
                            <a href='" . URLROOT . "/voedselpakket/delete/$items->Id'>delete</a>
                        </td>
                      </tr>";
        }

        $data = [
            'title' => "Overzicht voedselpakket",
            'rows' => $rows
        ];
        $this->view('voedselpakket/index', $data);
    }

    public function update($id = null) 
    {
        /**
         * Check if there is a POST request from the update.php view
         */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /**
             * Clean the $_POST array
             */
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->voedselpakketModel->updateVoedselpakket($_POST);

            header("Location: " . URLROOT . "/voedselpakket/index");
            exit;
        }

        $record = $this->voedselpakketModel->getVoedselpakket($id);

        $data = [
            'title' => 'Update Landen',
            'Id' => $record->Id,
            'Name' => $record->Name,
            'CapitalCity' => $record->CapitalCity,
            'Continent' => $record->Continent,
            'Population' => $record->Population
        ]; 
        $this->view('voedselpakket/update', $data);
    }

    public function delete($id)
    {
        $result = $this->voedselpakketModel->deleteVoedselpakket($id);
        if ($result) {
            echo "Het record is verwijderd uit de database";
            header("Refresh: 3; URL=" . URLROOT . "/voedselpakket/index");
        } else {
            echo "Internal server error, het record is niet verwijderd";
            header("Refresh: 3; URL=" . URLROOT . "/voedselpakket/index");
        }
        exit;
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Clean the $_POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->voedselpakketModel->createVoedselpakket($_POST);

            if ($result) {
                echo "Het invoeren is gelukt";
                header("Refresh:3; URL=" . URLROOT . "/voedselpakket/index");
            } else {
                echo "Het invoeren is NIET gelukt";
                header("Refresh:3; URL=" . URLROOT . "/voedselpakket/index");
            }
            exit;
        }

        $data = [
            'title' => 'Stel een nieuwe voedselpakket samen'
        ];
        $this->view('voedselpakket/create', $data);
    }
}
