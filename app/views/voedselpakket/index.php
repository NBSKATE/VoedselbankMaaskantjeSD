<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Voedselpakket Overzicht</title>

    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Overzicht gezinnen met voedselpakketten</h1>
            <div class="row">
            <div class="col">
                <form method="POST" action="<?= URLROOT; ?>/voedselpakket/gezinnen">
                    <div class="form-group">
                        <label for="eetwens">Selecteer eetwens:</label>
                        <select class="form-control" id="eetwens" name="eetwens">
                            <?php foreach ($eetwensen as $eetwens) : ?>
                            <option value="<?= $eetwens->Id; ?>"><?= $eetwens->Naam; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Toon Gezinnen</button>
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <table class="table table-white table-hover">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Omschrijving</th>
                            <th>Volwassenen</th>
                            <th>Kinderen</th>
                            <th>Babies</th>
                            <th>Vertegenwoordiger</th>
                            <th>Voedselpakket Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $data['rows']; ?>
                    </tbody>
                </table>
                <!-- make me a button that goes to voedselpakket/update -->
                <a href="<?= URLROOT; ?>/voedselpakket/update" class="btn btn-primary">Voedselpakket toevoegen</a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <p><a href="<?= URLROOT; ?>/landingpages/index">Terug naar de landingpagina</a></p>

</body>

</html>