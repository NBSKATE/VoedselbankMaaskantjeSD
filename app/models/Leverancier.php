<?php

/**
 * Dit is de model voor de controller Leveranciers
 */

class Leverancier
{
    //properties
    private $db;

    // Dit is de constructor van de Country model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getLeveranciers()
    {
        $this->db->query('SELECT Leverancier.Id, Leverancier.Naam, Leverancier.ContactPersoon, Leverancier.LeverancierNummer, Leverancier.LeverancierType, Contact.Email, Contact.Mobiel
        FROM Leverancier
        INNER JOIN Contact ON Leverancier.Id = Contact.Id;
        ');

        // $this->db->bind(':LeverancierId', $leverancierId);

        return $this->db->resultSet();
    }

    // public function getProduct($id)
    // {
    //     $this->db->query("SELECT
    //     l.Id AS LeverancierId,
    //     l.Naam,
    //     l.LeverancierNummer,
    //     l.LeverancierType,
    //     p.Id AS ProductId,
    //     p.Naam,
    //     p.SoortAllergie,
    //     p.Barcode,
    //     p.Houdbaarheidsdatum
    // FROM
    //     Leverancier l
    //     JOIN ProductPerLeverancier pl ON l.Id = pl.LeverancierId
    //     JOIN Product p ON pl.ProductId = p.Id
    // WHERE
    //     l.Id = :id");
    //     $this->db->bind(':id', $id, PDO::PARAM_INT);
    //     return $this->db->single();
    // }

    public function getProduct($id)
    {
        $this->db->query("SELECT
        l.Id AS LeverancierId,
        l.Naam AS LeverancierNaam,
        l.LeverancierNummer,
        l.LeverancierType,
        p.Id AS ProductId,
        p.Naam AS ProductNaam,
        p.SoortAllergie,
        p.Barcode,
        p.Houdbaarheidsdatum
    FROM
        Leverancier l
        JOIN ProductPerLeverancier pl ON l.Id = pl.LeverancierId
        JOIN Product p ON pl.ProductId = p.Id
    WHERE
        l.Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->resultSet();
    }



    public function updateLeverancier($data)
    {
        // var_dump($data);exit();
        $this->db->query("UPDATE klant
                          SET Naam = :Naam,
                              Achternaam = :Achternaam,
                              Tussenvoegsel = :Tussenvoegsel,
                              Volwassenen = :Volwassenen,
                              Kinderen = :Kinderen,
                              Babies = :Babies
                          WHERE Id = :Id");

        $this->db->bind(':Naam', $data['Naam'], PDO::PARAM_STR);
        $this->db->bind(':LeverancierNummer', $data['LeverancierNummer'], PDO::PARAM_STR);
        $this->db->bind(':Tussenvoegsel', $data['Tussenvoegsel'], PDO::PARAM_STR);
        $this->db->bind(':Kinderen', $data['Kinderen'], PDO::PARAM_INT);
        $this->db->bind(':Babies', $data['Babies'], PDO::PARAM_INT);
        $this->db->bind(':Id', $data['id'], PDO::PARAM_INT);

        return $this->db->execute();
    }

    // public function deleteKlant($id)
    // {
    //     $this->db->query("DELETE FROM klant WHERE Id = :id");
    //     $this->db->bind(':id', $id, PDO::PARAM_INT);
    //     return $this->db->execute();
    // }



    // public function createKlant($post)
    // {
    //     $this->db->query("INSERT INTO klant (Id, 
    //                                            Naam, 
    //                                            Tussenvoegsel, 
    //                                            Achternaam, 
    //                                            Volwassenen,
    //                                            Kinderen,
    //                                            Babies
    //                                            )
    //                       VALUES              (:Id,
    //                                            :Naam,
    //                                            :Tussenvoegsel,
    //                                            :Achternaam,
    //                                            :Volwassenen,
    //                                            :Kinderen,
    //                                            :Babies)");
    //     $this->db->bind(':Id', NULL, PDO::PARAM_NULL);
    //     $this->db->bind(':Naam', $post['Naam'], PDO::PARAM_STR);
    //     $this->db->bind(':Tussenvoegsel', $post['Tussenvoegsel'], PDO::PARAM_STR);
    //     $this->db->bind(':Achternaam', $post['Achternaam'], PDO::PARAM_STR);
    //     $this->db->bind(':Volwassenen', $post['Volwassenen'], PDO::PARAM_INT);
    //     $this->db->bind(':Kinderen', $post['Kinderen'], PDO::PARAM_INT);
    //     $this->db->bind(':Babies', $post['Babies'], PDO::PARAM_INT);
    //     return $this->db->execute();
    // }

    // public function createKlant($post)
    // {
    //     $query = "INSERT INTO klant (Naam, Tussenvoegsel, Achternaam, Volwassenen, Kinderen, Babies, DatumAangemaakt, DatumGewijzigd)
    //               VALUES (:Naam, :Tussenvoegsel, :Achternaam, :Volwassenen, :Kinderen, :Babies, SYSDATE(), SYSDATE())";

    //     $statement = $this->db->prepare($query);

    //     $statement->bindValue(':Naam', $post['Naam']);
    //     $statement->bindValue(':Tussenvoegsel', $post['Tussenvoegsel']);
    //     $statement->bindValue(':Achternaam', $post['Achternaam']);
    //     $statement->bindValue(':Volwassenen', $post['Volwassenen']);
    //     $statement->bindValue(':Kinderen', $post['Kinderen']);
    //     $statement->bindValue(':Babies', $post['Babies']);

    //     $result = $statement->execute();

    //     return $result;
    // }
}
