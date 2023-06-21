<h3><?= $data['title']; ?></h3>

<form action="<?= URLROOT; ?>/klanten/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>Naam:</td>
                <td><input type="text" name="Naam" id="Naam" value="<?= $data['Naam']; ?>"></td>
            </tr>
            <tr>
                <td>Tussenvoegsel:</td>
                <td><input type="text" name="Tussenvoegsel" id="Tussenvoegsel" value="<?= $data['Tussenvoegsel']; ?>"></td>
            </tr>
            <tr>
                <td>Achternaam:</td>
                <td><input type="text" name="Achternaam" id="Achternaam" value="<?= $data['Achternaam']; ?>"></td>
            </tr>
            <tr>
                <td>Aantal Volwassenen:</td>
                <td><input type="number" name="Volwassenen" id="Volwassenen" max="2" value="<?= $data['Volwassenen']; ?>"></td>
            </tr>
            <tr>
                <td>Aantal Kinderen:</td>
                <td><input type="number" name="Kinderen" id="Kinderen" max="2" value="<?= $data['Kinderen']; ?>"></td>
            </tr>
            <tr>
                <td>Aantal Babies:</td>
                <td><input type="number" name="Babies" id="Babies" max="2" value="<?= $data['Babies']; ?>"></td>
            </tr>

            <tr>
                <td><input type="hidden" name="id" id="id" value="<?= $data['Id']; ?>"></td>
                <td><input type="submit" name="submit" id="submit" value="Verstuur"></td>
            </tr>
        </tbody>
    </table>

</form>