<h3><?= $data['title']; ?></h3>
<h1>Leveranciers</h1>
<a href="<?= URLROOT ?>/leveranciers/create">Nieuw record</a>
<form action="<?= URLROOT ?>/leveranciers/create" method="POST">
    <label for="bedrijfsnaam">Bedrijfsnaam:</label>
    <input type="text" id="bedrijfsnaam" name="bedrijfsnaam" required>
    <br>
    <label for="adres">Adres:</label>
    <input type="text" id="adres" name="adres" required>
    <br>
    <label for="contactpersoon">Contactpersoon:</label>
    <input type="text" id="contactpersoon" name="contactpersoon" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="telefoonnummer">Telefoonnummer:</label>
    <input type="text" id="telefoonnummer" name="telefoonnummer" required>
    <br>
    <label for="eerstvolgendeLevering">Eerstvolgende Levering:</label>
    <input type="text" id="eerstvolgendeLevering" name="eerstvolgendeLevering" required>
    <br>
    <input type="submit" value="Toevoegen">
</form>
<p><a href="<?= URLROOT; ?>/landingpages/index">Terug naar landingpagina</a></p>