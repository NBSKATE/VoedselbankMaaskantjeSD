<?php

/**
 * Dit is de model voor de controller Klanten
 */

class Klant
{
    //properties
    private $db;

    // Dit is de constructor van de Country model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getKlanten()
    {
        $this->db->query('SELECT klant.Id, klant.Naam, klant.Tussenvoegsel, klant.Achternaam, klant.Volwassenen, klant.Kinderen, klant.Babies, klant.Wens, 
        adres.Straatnaam, adres.Huisnummer, adres.Toevoeging, adres.Postcode, adres.Plaats, contact.Telefoon, contact.Email
        FROM klant
        JOIN adres ON klant.AdresId = adres.Id
        JOIN contact ON klant.KlantContactId = contact.Id;');

        // $this->db->bind(':klantId', $klantId);


        return $this->db->resultSet();
    }

    public function getKlant($id)
    {
        $this->db->query("SELECT * FROM klant WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    // public function updateKlant($data)
    // {
    //     // var_dump($data);exit();
    //     $this->db->query("UPDATE Country
    //                       SET Name = :Name,
    //                           CapitalCity = :CapitalCity,
    //                           Continent = :Continent,
    //                           Population = :Population
    //                       WHERE Id = :Id");

    //     $this->db->bind(':Name', $data['name'], PDO::PARAM_STR);
    //     $this->db->bind(':CapitalCity', $data['capitalCity'], PDO::PARAM_STR);
    //     $this->db->bind(':Continent', $data['continent'], PDO::PARAM_STR);
    //     $this->db->bind(':Population', $data['population'], PDO::PARAM_INT);
    //     $this->db->bind(':Id', $data['id'], PDO::PARAM_INT);

    //     return $this->db->execute();
    // }

    public function deleteKlant($id)
    {
        $this->db->query("DELETE FROM klant WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }



    // public function createKlant($post)
    // {
    //     $this->db->query("INSERT INTO country (Id, 
    //                                            Name, 
    //                                            CapitalCity, 
    //                                            Continent, 
    //                                            Population)
    //                       VALUES              (:Id,
    //                                            :Name,
    //                                            :CapitalCity,
    //                                            :Continent,
    //                                            :Population)");
    //     $this->db->bind(':Id', NULL, PDO::PARAM_NULL);
    //     $this->db->bind(':Name', $post['name'], PDO::PARAM_STR);
    //     $this->db->bind(':CapitalCity', $post['capitalCity'], PDO::PARAM_STR);
    //     $this->db->bind(':Continent', $post['continent'], PDO::PARAM_STR);
    //     $this->db->bind(':Population', $post['population'], PDO::PARAM_INT);
    //     return $this->db->execute();
    // }
}
