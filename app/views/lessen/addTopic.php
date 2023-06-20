<h3><?= $data['title']; ?></h3>


<form action="<?= URLROOT; ?>/lessen/addTopic" method="post">
    <label for="topic">Nieuw onderwerp</label>
    <input type="text" name="topic" id="topic"><br>
    <input type="hidden" name="lesId" value="<?= $data['lesId']; ?>">
    <input type="submit" value="Verstuur">
</form>