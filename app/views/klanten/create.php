<h3><?= $data['title']; ?></h3>

<form action="<?= URLROOT; ?>/klanten/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>Naam:</td>
                <td><input type="text" name="Naam" id="Naam"></td>
            </tr>
            <tr>
                <td>Tussenvoegsel:</td>
                <td><input type="text" name="Tussenvoegsel" id="Tussenvoegsel"></td>
            </tr>
            <tr>
                <td>Achternaam:</td>
                <td><input type="text" name="Achternaam" id="Achternaam"></td>
            </tr>
            <tr>
                <td>Volwassenen:</td>
                <td><input type="text" name="Volwassenen" id="Volwassenen"></td>
            </tr>
            <td>Kinderen:</td>
            <td><input type="text" name="Kinderen" id="Kinderen"></td>
            </tr>
            <td>Babies:</td>
            <td><input type="text" name="Babies" id="Babies"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" id="submit" value="Verstuur"></td>
            </tr>
        </tbody>
    </table>

</form>