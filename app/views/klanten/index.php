<h3><?= $data['title'] ?></h3>
<a href="<?= URLROOT ?>/klanten/create">Nieuw record</a>
<table>
    <thead>
        <th>Id</th>
        <th>Naam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Volwassenen</th>
        <th>Kinderen</th>
        <th>Babies</th>
        <th>Update</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
<p><a href="<?= URLROOT; ?>/landingpages/index">terug naar landingpage</a></p>