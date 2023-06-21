<!doctype html>
<html lang="en">

<head>

    <title>Overzicht Leveranciers</title>

    <link rel="stylesheet" href="nikocss.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <hr>
            <div class="header">
                <h1>Overzicht leveranciers</h1>
                <style>
                    .header {
                        display: flex;
                        justify-content: space-between;
                        padding: 10px;
                    }
                </style>
                <h1>
                    <form action="/action_page.php">
                        <label for="leverancierslist">Selecteer leveranciertype:</label>
                        <select name="leverancierslist" id="leverancierslist">
                            <option value="Bedrijf">Bedrijf</option>
                            <option value="Instelling">Instelling</option>
                            <option value="Overheid">Overheid</option>
                            <option value="Particulier">Particulier</option>
                            <option value="Donor">Donor</option>
                            <input type="submit" value="Submit">
                        </select>
                    </form>
                </h1>
            </div>
            <hr>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">

                <table class="">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Contactpersoon</th>
                            <th>Email</th>
                            <th>Mobiel</th>
                            <th>Leveranciernummer</th>
                            <th>LeverancierType</th>
                        </tr>
                    </thead>
                    </tbody>
                    <?= $data['rows']; ?>
                </table>
            </div>
        </div>
    </div>
    <center>
        <p><a href="<?= URLROOT; ?>/landingpages/index">terug naar landingpage</a></p>
    </center>
</body>

</html>