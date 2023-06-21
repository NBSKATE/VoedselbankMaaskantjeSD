<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .form-select {
        display: inline-block;
        width: auto;
        vertical-align: middle;
    }
    
    .btn {
        display: inline-block;
        vertical-align: middle;
        margin-left: 10px;
    }

    .containerform {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .containerbutton{
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    
    .form-select {
        margin-right: 10px;
    }
    .Terugkeren {
        margin-left: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Overzicht klanten</h1>
        </div>
    </div>

        <div class="container">
            <div class="containerform">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Selecteer een postcode</option>
                    <option value="1">5271TH</option>
                    <option value="2">5271ZE</option>
                    <option value="3">5271TJ</option>
                    <option value="3">5271ZH</option>
                </select>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='<?= URLROOT; ?>/klanten/index'">Toon klanten</button>
            </div>
        </div>

<div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Naam Gezin</th>
                            <th>Vertegenwoordiger</th>
                            <th>E-mailadres</th>
                            <th>Mobiel</th>
                            <th>Adres</th>
                            <th>Woonplaats</th>
                            <th>Klanten details</th>
                        </tr>
                    </thead>
                    </tbody>
                    <?= $data['rows']; ?>
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="containerbutton">
            <button type="button" class="btn btn-primary" onclick="window.location.href='<?= URLROOT; ?>/landingpages/index'">Home</button>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>

</html>