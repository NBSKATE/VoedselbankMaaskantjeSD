<?= "<h3>" . $data['title'] . "</h3><h4>Naam instructeur: " . $data['nameInstructor'] . "</h4>"?>

<table border='1'>
    <thead>
       <th>Datum</th>
       <th>Tijd</th>
       <th>Naam Leerling</th>
       <th>LesInfo</th>
       <th>Onderwerp</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>