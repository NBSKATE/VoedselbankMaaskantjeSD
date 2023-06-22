<h3><?= $data['title']; ?></h3>

<form action="<?= URLROOT; ?>/leveranciers/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>Houdbaarheidsdatum:</td>
                <td><input type="Date" name="Date" id="Date" value="<?= $data['datum']; ?>"></td>
                <td><input type="hidden" name="id" id="id" value="<?= $data['id']; ?>"></td>
            </tr>


            <tr>
                <td><input type="submit" name="submit" id="submit" value="Verstuur"></td>
            </tr>
        </tbody>
    </table>

</form>