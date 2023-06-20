<h3><?= $data['title']; ?></h3>
<h1>Leveranciers</h1>
<a href="<?= URLROOT ?>/leveranciers/create">Nieuw record</a>
<table border="1">
    <thead>
        <tr>
            <th>Leverancier</th>
            <th>Adres</th>
            <th>Contactpersoon</th>
            <th>Email</th>
            <th>Telefoonnummer</th>
            <th>Eerstvolgende Levering</th>
            <th>Action</th>
            <th>Email</th>
        </tr>
        <!-- edit button that goes to update.php  -->
        <a href="<?= URLROOT ?>/leveranciers/update">Update</a>



    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
<p><a href="<?= URLROOT; ?>/landingpages/index">back to landingpage</a></p>
<style>
.edit-link,
.delete-link {
    text-decoration: none;
    color: #000;
    margin-right: 5px;
}
</style>