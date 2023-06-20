<?php

/**
 * This is the model for the Voedselpakket controller.
 */
class Voedselpakket
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
        $this->db->query('SELECT * FROM Voedselpakket');
        return $this->db->resultSet();
    }

    public function getVoedselpakketById($id)
    {
        $this->db->query("SELECT * FROM Voedselpakket WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateVoedselpakket($data)
    {
        $this->db->query("UPDATE Voedselpakket
                          SET Name = :Name,
                              CapitalCity = :CapitalCity,
                              Continent = :Continent,
                              Population = :Population
                          WHERE Id = :Id");

        $this->db->bind(':Name', $data['name'], PDO::PARAM_STR);
        $this->db->bind(':CapitalCity', $data['capitalCity'], PDO::PARAM_STR);
        $this->db->bind(':Continent', $data['continent'], PDO::PARAM_STR);
        $this->db->bind(':Population', $data['population'], PDO::PARAM_INT);
        $this->db->bind(':Id', $data['id'], PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function deleteVoedselpakket($id)
    {
        $this->db->query("DELETE FROM Voedselpakket WHERE Id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function createVoedselpakket($data)
    {
        $this->db->query("INSERT INTO Voedselpakket (Name, CapitalCity, Continent, Population)
                          VALUES (:Name, :CapitalCity, :Continent, :Population)");
        $this->db->bind(':Name', $data['name'], PDO::PARAM_STR);
        $this->db->bind(':CapitalCity', $data['capitalCity'], PDO::PARAM_STR);
        $this->db->bind(':Continent', $data['continent'], PDO::PARAM_STR);
        $this->db->bind(':Population', $data['population'], PDO::PARAM_INT);
        return $this->db->execute();
    }
}
