<?php

class Lessen extends Controller
{
    private $lesModel;

    public function __construct()
    {
        // We maken een object van de model class en stoppen dit in een $lesModel
        $this->lesModel = $this->model('Les');
    }

    public function index()
    {
        $result = $this->lesModel->getLessen();

        var_dump($result);

        $rows = "";

        foreach ($result as $lesinfo) {
            $rows .= "<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>";
        }

        $data = [
            'title' => 'Overzicht lessen',
            'rows' => $rows
        ];
        $this->view('lessen/index', $data);
    }
}
