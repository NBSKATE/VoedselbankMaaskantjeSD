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
        $this->db->query('SELECT gezin.Naam, gezin.Omschrijving, gezin.AantalVolwassenen, gezin.Aantalkinderen, gezin.Aantalbabys, persoon.Voornaam, persoon.Tussenvoegsel, persoon.Achternaam, persoon.IsVertegenwoordiger, voedselpakket.*
        FROM Gezin gezin
        LEFT JOIN Persoon persoon ON gezin.Id = persoon.GezinId
        LEFT JOIN Voedselpakket voedselpakket ON voedselpakket.GezinId = gezin.Id;        
        ');
        

        return $this->db->resultSet();
    }
}