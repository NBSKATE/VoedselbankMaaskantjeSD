<?php
$data = []; // Initialize an empty array

// Assign values to the $data array
$data['title'] = "Maak een voedselpakket hier";
$data['rows'] = "<tr>...</tr>"; // Replace this with the actual rows

?>

<h3><?= $data['title']; ?></h3>

<a href="/voedselpakket/create">Nieuw record</a>
<table>
    <thead>
        <th>Id</th>
        <th>Naam</th>
        <th>Hoofdstad</th>
        <th>Continent</th>
        <th>Aantal Inwoners</th>
        <th>Update</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
<p><a href="/landingpages/index">Back to landing page</a></p>
