<?php

/**
 * Dit is de model voor de controller Countries
 */

class Les
{
    //properties
    private $db;

    // Dit is de constructor van de Country model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getLessen()
    {
        $this->db->query("SELECT Les.DatumTijd
                                ,Les.Id
                                ,Leerling.Id
                                ,Leerling.Naam
                          FROM Les
                          INNER JOIN Leerling
                          ON Leerling.Id = Les.LeerlingId
                          WHERE Les.InstructeurId = :Id");
        $this->db->bind(':Id', 2, PDO::PARAM_INT);
        return $this->db->resultSet();
    }
}
