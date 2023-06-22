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
    public function productDetails($id = null)
    {
        $record = $this->leverancierModel->getProduct($id);

        $rows = '';
        $rowz = '';

        foreach ($record as $items) {
            $rows .= "          
                        <tr>
                        <td>$items->LeverancierNaam</td>
                        <td>$items->SoortAllergie</td>
                        <td>$items->Barcode</td>
                        <td>$items->Houdbaarheidsdatum</td>
                        
                        <td>
                            <a href='" . URLROOT . "/leveranciers/update/$items->LeverancierId'>wijzig product</a>
                        </td>                       
                      </tr>";
        }
        $rowz .= " <table>
            <tr>
                <th>Naam</th>
                <td>$items->ProductNaam</td>
            </tr>
            <tr>
                <th>Leveranciernummer</th>
                <td>$items->LeverancierNummer</td>
            </tr>
            <tr>
                <th>Leveranciertype</th>
                <td>$items->LeverancierType</td>
            </tr>
        </table>";




        // $data = [
        //     'title' => 'Update Klanten',
        //     'Id' => $record->LeverancierId,
        //     'LNaam' => $record->LNaam,
        //     'PNaam' => $record->PNaam,
        //     'Leveranciernummer' => $record->LeverancierNummer,
        //     'Barcode' => $record->Barcode,
        //     'Houdbaarheidsdatum' => $record->Houdbaarheidsdatum
        // ];
        $data = [
            'title' => 'Update Product',
            'rows' => $rows,
            'rowz' => $rowz
        ];

        $this->view('leveranciers/productDetails', $data);
    }

    //    
    // public function productDetails($id)
    // {
    //     $record = $this->leverancierModel->getProduct($id);

    //     $rows = '';

    //     foreach ($record as $item) {
    //         $rows .= "<tr>
    //                 <td>$item->ProductNaam</td>
    //                 <td>$item->SoortAllergie</td>
    //                 <td>$item->Barcode</td>
    //                 <td>$item->Houdbaarheidsdatum</td>
    //               </tr>";
    //     }

    //     $data = [
    //         'title' => "Product Details",
    //         'rows' => $rows
    //     ];
    //     $this->view('leveranciers/productDetails', $data);
    // }

    /////

    public function update($id = null)
    {
        // var_dump($id);
        // exit;
        /**
         * Controleer of er gepost wordt vanuit de view update.php
         */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /**
             * Maak het $_POST array schoon
             */
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->leverancierModel->updateProduct($_POST);

            header("Location: " . URLROOT . "/leverancier/update");
        } else {

            $record = $this->leverancierModel->getupdatedetails($id);
            // var_dump($record);


            $data = ['title' => 'Wijzig Product', 'datum' => $record->Houdbaarheidsdatum, 'id' => $id];
            $this->view('leveranciers/update', $data);
        }
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
