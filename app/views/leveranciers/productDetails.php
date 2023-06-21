<h3><?= $data['title']; ?></h3>

<form action="<?= URLROOT; ?>/leveranciers/productDetails" method="post">
    <table>
        <tbody>
            <tr>
                <td>Naam:</td>
                <td><input type="text" name="Naam" id="Naam" value="<?= $data['Naam']; ?>"></td>
            </tr>
            <tr>
                <td>Leveranciernummer:</td>
                <td><input type="text" name="Tussenvoegsel" id="Tussenvoegsel" value="<?= $data['Tussenvoegsel']; ?>"></td>
            </tr>
            <tr>
                <td>Leveranciertype:</td>
                <td><input type="text" name="Achternaam" id="Achternaam" value="<?= $data['Achternaam']; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" id="id" value="<?= $data['Id']; ?>"></td>
                <td><input type="submit" name="submit" id="submit" value="Verstuur"></td>
            </tr>
        </tbody>
    </table>

</form>