<?php
$data = []; // Initialize an empty array

// Assign values to the $data array
$data['title'] = "";
$data['rows'] = "<tr>...</tr>"; // Replace this with the actual rows
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>

    </style>
</head>

<body>
    <div class="container">

    <div class="row g-3">
  <div class="col">
    <input type="text" class="form-control" placeholder="First name" aria-label="First name">
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
  </div>
</div>
        <div class="alert alert-info text-center" role="alert">
            <h2>Samenstellen van het voedselpakket</h2>
        </div>
        <div class="row">
            
            <div class="col">
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="picklistItemsDatatable_wrapper" class="dataTables_wrapper no-footer"></div>
                            <table id="picklistItemsDatatable" class="display dataTable no-footer" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="pickStatus sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Pickstatus: activeer om kolom oplopend te sorteren">Pickstatus</th>
                                        <th class="productImage sorting_disabled" rowspan="1" colspan="1" aria-label=""></th>
                                        <th class="picklocation sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Locatie: activeer om kolom aflopend te sorteren">Locatie</th>
                                        <th class="product productName sorting_disabled" rowspan="1" colspan="1" aria-label="Product">Product</th>
                                        <th class="orderNumbers sorting_disabled" rowspan="1" colspan="1" aria-label="Bestelnummer">Bestelnummer</th>
                                        <th class="quantity sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Aantal: activeer om kolom oplopend te sorteren">Aantal</th>
                                        <th class="packedCount sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Ingepakt: activeer om kolom oplopend te sorteren">Ingepakt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Rows representing picklist items -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <a href="index.php" style="padding-top: 10px;"><button type="button" class="btn btn-secondary">Volgende</button></a>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
