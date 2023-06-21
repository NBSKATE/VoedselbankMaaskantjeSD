<?php
/**
 * This is the model for the Voedselpakket controller.
 */
class VoedselpakketModel
{
    // Properties
    private $db;

    // Constructor of the Voedselpakket model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getVoedselpakket()
{
    $this->db->query('SELECT klant.Id, klant.Naam, klant.Tussenvoegsel, klant.Achternaam, klant.Volwassenen, klant.Kinderen, klant.Babies, klant.Vertegenwoordiger,
    adres.Straatnaam, adres.Huisnummer, adres.Toevoeging, adres.Postcode, adres.Plaats, contact.Telefoonnummer, contact.Emailadres
    FROM klant
    JOIN adres ON klant.AdresId = adres.Id
    JOIN contact ON klant.KlantContactId = contact.Id;');

    return $this->db->resultSet();
}

}