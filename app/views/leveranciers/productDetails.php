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
                <h1>Overzicht producten</h1>
                <style>
                    .header {
                        display: flex;
                        justify-content: space-between;
                        padding: 10px;
                    }
                </style>
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
                            <th>SoortAllergie</th>
                            <th>Barcode</th>
                            <th>Houdbaarheidsdatum</th>
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