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
            <ul class="list-group">
                <li class="list-group-item"><?= $name;?></li>
                <li class="list-group-item"><?= $data['rows'];?></li>
                <li class="list-group-item"><?= $data['rows'];?></li>
            </ul>

            <div class="row">
                <div class="col">
                    <table class="table table-white table-hover">
                        <thead>
                            <tr>
                                <th>Pakketnummer</th>
                                <th>Datum samenstelling</th>
                                <th>Datum uitgifte</th>
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