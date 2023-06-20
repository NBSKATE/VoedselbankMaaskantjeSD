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
        $this->db->query('SELECT klant.Id, klant.Naam, klant.Tussenvoegsel, klant.Achternaam, klant.Volwassenen, klant.Kinderen, klant.Babies, klant.Wens, 
        adres.Straatnaam, adres.Huisnummer, adres.Toevoeging, adres.Postcode, adres.Plaats, contact.Telefoon, contact.Email
        FROM klant
        JOIN adres ON klant.AdresId = adres.Id
        JOIN contact ON klant.KlantContactId = contact.Id;');

        // $this->db->bind(':klantId', $klantId);


        return $this->db->resultSet();
    }

    public function getVoedselpakketById ($id)
    {
        $this->db->query("SELECT * FROM klant WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function deleteVoedselpakket($id)
    {
        $this->db->query("DELETE FROM klant WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }
//     public function getVoedselpakketById($id)
//     {
//         $this->db->query("SELECT * FROM voedselpakket WHERE Id = :id");
//         $this->db->bind(':id', $id, PDO::PARAM_INT);
//         return $this->db->single();
//     }

//     public function updateVoedselpakket($data)
//     {
//         $this->db->query("UPDATE voedselpakket
//                           SET Id = :Id,
//                             KlantId = :KlantId,
//                             Samenstellingsdatum = :Samenstellingsdatum,
//                             Uitgiftedatum = :Uitgiftedatum,
//                             isActief = :isActief,
//                             Opmerking = :Opmerking,
//                             DatumAangemaakt = :DatumAangemaakt,
//                             Datumgewijzigd = :Datumgewijzigd
//                           WHERE Id = :Id");

//         $this->db->bind(':Id', $data['Id'], PDO::PARAM_INT);
//         $this->db->bind(':KlantId', $data['KlantId'], PDO::PARAM_INT);
//         $this->db->bind(':Samenstellingsdatum', $data['Samenstellingsdatum'], PDO::PARAM_STR);
//         $this->db->bind(':Uitgiftedatum', $data['Uitgiftedatum'], PDO::PARAM_STR);
//         $this->db->bind(':isActief', $data['isActief'], PDO::PARAM_INT);
//         $this->db->bind(':Opmerking', $data['Opmerking'], PDO::PARAM_STR);
//         $this->db->bind(':DatumAangemaakt', $data['DatumAangemaakt'], PDO::PARAM_STR);
//         $this->db->bind(':Datumgewijzigd', $data['Datumgewijzigd'], PDO::PARAM_STR);

//         return $this->db->execute();
//     }

//     public function deleteVoedselpakket($id)
//     {
//         $this->db->query("DELETE FROM voedselpakket WHERE Id = :id");
//         $this->db->bind(':id', $id, PDO::PARAM_INT);
//         return $this->db->execute();
//     }

//     public function createVoedselpakket($data)
//     {
//         $this->db->query("INSERT INTO voedselpakket (Id, KlantId, Samenstellingsdatum, Uitgiftedatum, isActief, Opmerking, DatumAangemaakt, Datumgewijzigd)
//                           VALUES (:Id, :KlantId, :Samenstellingsdatum, :Uitgiftedatum, :isActief, :Opmerking, :DatumAangemaakt, :Datumgewijzigd)");
//         $this->db->bind(':Id', $data['Id'], PDO::PARAM_INT);
//         $this->db->bind(':KlantId', $data['KlantId'], PDO::PARAM_INT);
//         $this->db->bind(':Samenstellingsdatum', $data['Samenstellingsdatum'], PDO::PARAM_STR);
//         $this->db->bind(':Uitgiftedatum', $data['Uitgiftedatum'], PDO::PARAM_STR);
//         $this->db->bind(':isActief', $data['isActief'], PDO::PARAM_INT);
//         $this->db->bind(':Opmerking', $data['Opmerking'], PDO::PARAM_STR);
//         $this->db->bind(':DatumAangemaakt', $data['DatumAangemaakt'], PDO::PARAM_STR);
//         $this->db->bind(':Datumgewijzigd', $data['Datumgewijzigd'], PDO::PARAM_STR);
//         return $this->db->execute();
//     }
}