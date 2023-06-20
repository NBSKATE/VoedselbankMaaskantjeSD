<?php
$data = []; // Initialize an empty array

// Assign values to the $data array
$data['title'] = "Samenstellen van de voedselpakket";
$data['rows'] = "<tr>...</tr>"; // Replace this with the actual rows

?>

<h3><?= $data['title']; ?></h3>

<form action="<?= URLROOT ?>/voedselpakket/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>Land:</td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td>Hoofstad:</td>
                <td><input type="text" name="capitalCity" id="capitalCity"></td>
            </tr>
            <tr>
                <td>Continent:</td>
                <td><input type="text" name="continent" id="continent"></td>
            </tr>
            <tr>
                <td>Aantal inwoners:</td>
                <td><input type="text" name="population" id="population"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" id="submit" value="Verstuur"></td>
            </tr>
        </tbody>
    </table>
</form>
