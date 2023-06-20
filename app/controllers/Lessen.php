<?php
class Lessen extends Controller {

  public function __construct() {
    $this->lesModel = $this->model('Les');
  }

  public function index() 
  {
    $result = $this->lesModel->getMyLessons();
    // var_dump($result);
    $rows = '';
    foreach ($result as $lesinfo) {

        $d = new DateTimeImmutable($lesinfo->DatumTijd, DTZ);
        

        $rows .=    "<tr>
                        <td>{$d->format('d-m-Y')}</td>
                        <td>{$d->format('H:i:s')}</td>
                        <td>$lesinfo->Naam</td>
                        <td><a href=''><img src='" . URLROOT . "/img/b_help.png' alt=''></a></td>
                        <td><a href='" . URLROOT . "/lessen/topiclesson/{$lesinfo->Id}'><img src='" . URLROOT . "/img/b_props.png' alt=''></a></td>
                    </tr>";
    }

    $data = [
      'title' => 'Overzicht lessen',
      'rows' => $rows,
      'nameInstructor' => $result[0]->INSN
    ];
    $this->view('lessen/index', $data);
  }

  public function topicLesson($lesId)
  {

    $result = $this->lesModel->getTopicsLessons($lesId);

    if ($result) {
        $dateTime = new DateTimeImmutable($result[0]->DatumTijd, DTZ);
        $dateTime = $dateTime->format('d-m-Y H:i:s');
    } else {
        $dateTime = "";
    }

    $rows = '';
    foreach($result as $topic) {
        $rows .= "<tr>
                    <td>$topic->Onderwerp</td>
                  </tr>";
    }
    // var_dump($result);
    $data = [
        'title' => 'Onderwerpen Les',
        'rows' => $rows,
        'lesId' => $lesId,
        'dateTime' => $dateTime
    ];
    $this->view('lessen/topiclesson', $data);
  }

  public function addTopic($lesId = NULL) 
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $result = $this->lesModel->addTopic($_POST);
        if ($result) {
           echo "<p>Het nieuwe onderwerp is succesvol toegevoegd</p>";
           header('Refresh:3 url=' . URLROOT . '/lessen/index');
        } else {
           echo "Het nieuwe onderwerp is niet toegevoegd";
           header('Refresh:3 url=' . URLROOT . '/lessen/index');
        }
    }

    $data = [
        'title' => 'Voeg een nieuw onderwerp toe',
        'lesId' => $lesId
    ];
    $this->view('lessen/addTopic', $data);
  }
}

?>