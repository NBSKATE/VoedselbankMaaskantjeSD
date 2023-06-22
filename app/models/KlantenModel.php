<?php
/**
 * This is the model for the Klanten controller.
 */
class KlantenModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getKlanten()
    {
        $this->db->query('SELECT PERS.Id as persoonId, GEZI.Naam ,PERS.Voornaam ,PERS.Tuusenvoegsel ,PERS.Achternaam ,CONT.Email ,CONT.Mobiel ,CONT.Straat ,CONT.Huisnummer ,CONT.Toevoeging, CONT.Woonplaats 
        FROM gezin AS GEZI 
        INNER JOIN persoon AS PERS ON PERS.GezinId = GEZI.Id 
        INNER JOIN contactpergezin AS COGE ON COGE.GezinId = GEZI.Id 
        INNER JOIN contact AS CONT ON CONT.Id = COGE.ContactId 
        WHERE PERS.IsVertegenwoordig = 1;');
        return $this->db->resultSet();
    }

    
    public function getKlantenId(
        
    )
    {
        $this->db->query('SELECT PERS.Id as persoonId, PERS.Voornaam ,PERS.Tuusenvoegsel ,PERS.Achternaam ,PERS.Geboortedatum ,PERS.TypePersoon ,PERS.IsVertegenwoordig ,CONT.Straat ,CONT.Huisnummer ,CONT.Toevoeging ,CONT.Postcode ,CONT.Woonplaats ,CONT.Email ,CONT.Mobiel
        FROM gezin AS GEZI 
        INNER JOIN persoon AS PERS ON PERS.GezinId = GEZI.Id 
        INNER JOIN contactpergezin AS COGE ON COGE.GezinId = GEZI.Id 
        INNER JOIN contact AS CONT ON CONT.Id = COGE.ContactId 
        WHERE PERS.ID = 4;');
        return $this->db->execute();
    }
    

    public function getKlantenByName($id)
    {
        $this->db->query("SELECT * FROM persoon WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateKlanten($id)
    {
        $this->db->query("UPDATE persoon SET ... WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function deleteklant($id)
    {
        $this->db->query("DELETE FROM persoon WHERE Id = :id");
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