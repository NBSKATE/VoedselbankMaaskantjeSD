<?php

/**
 * Dit is het model voor de Leverancier-controller
 */

class Leverancier
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getLeveranciers()
    {
        $this->db->query("SELECT *
        FROM leverancier
        INNER JOIN adres ON leverancier.AdresId = adres.Id
        INNER JOIN contact ON leverancier.ContactId = contact.Id;     
        ");
        return $this->db->resultSet();
    }



    // ...
}

use PHPUnit\Framework\TestCase;

class LeverancierTest extends TestCase
{
    protected $leverancierModel;

    protected function setUp(): void
    {
        // Instantiate the model class that contains the getLeveranciers() method
        $this->leverancierModel = new LeverancierModel();
    }

    public function testGetLeveranciers()
    {
        // Call the getLeveranciers() method
        $result = $this->leverancierModel->getLeveranciers();

        // Assert that the result is an array
        $this->assertIsArray($result);

        // Assert that the result is not empty
        $this->assertNotEmpty($result);

        // Assert that each item in the result has the expected keys
        $expectedKeys = ['Bedrijfsnaam', 'Adres', 'Contactpersoon', 'Email', 'Telefoonnummer', 'EerstvolgendeLevering'];
        foreach ($result as $item) {
            $this->assertArrayHasKey($expectedKeys, $item);;
        }
    }
}


    // public function updateLeverancier($leverancierId, $bedrijfsnaam, $adres, $contactpersoonNaam, $email, $telefoonnummer, $eerstvolgendeLevering)
    // {
    //     $this->db->query("UPDATE Leverancier
    //                       SET Bedrijfsnaam = :bedrijfsnaam, Adres = :adres, ContactpersoonNaam = :contactpersoonNaam, Email = :email, Telefoonnummer = :telefoonnummer, EerstvolgendeLevering = :eerstvolgendeLevering
    //                       WHERE LeverancierId = :leverancierId");
    //     $this->db->bind(':leverancierId', $leverancierId);
    //     $this->db->bind(':bedrijfsnaam', $bedrijfsnaam);
    //     $this->db->bind(':adres', $adres);
    //     $this->db->bind(':contactpersoonNaam', $contactpersoonNaam);
    //     $this->db->bind(':email', $email);
    //     $this->db->bind(':telefoonnummer', $telefoonnummer);
    //     $this->db->bind(':eerstvolgendeLevering', $eerstvolgendeLevering);
    //     return $this->db->execute();
    // }

    // public function deleteLeverancier($leverancierId)
    // {
    //     $this->db->query("DELETE FROM Leverancier WHERE LeverancierId = :leverancierId");
    //     $this->db->bind(':leverancierId', $leverancierId);
    //     return $this->db->execute();
    // }