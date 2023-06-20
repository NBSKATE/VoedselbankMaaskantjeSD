<?php
  class Les {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getMyLessons() 
    {
        $this->db->query("SELECT Les.*
                                 ,Instructeur.*
                                 ,Leerling.*
                                 ,Les.Id
                                 ,Instructeur.Naam as INSN
                          FROM Les
                          INNER JOIN Instructeur
                          ON Instructeur.Id = Les.InstructeurId
                          INNER JOIN Leerling 
                          ON Leerling.Id = Les.LeerlingId
                          WHERE Instructeur.Id = :Id;");
                          
        $this->db->bind(':Id', 2);
  
        $result = $this->db->resultSet();
  
        return $result;
    }

    public function getTopicsLessons($lessonId)
    {
        $this->db->query("SELECT Les.*
                                ,Onderwerp.*
                          FROM Onderwerp
                          INNER JOIN Les
                          ON Les.Id = Onderwerp.LesId                          
                          WHERE Onderwerp.LesId = :lessonId");
        
        $this->db->bind(':lessonId', $lessonId);
       
        return $this->db->resultSet();
    }

    public function addTopic($post)
    {
        // var_dump($post);
        $sql = "INSERT INTO Onderwerp (Id
                                      ,LesId
                                      ,Onderwerp)
                VALUES                (NULL
                                      ,:lesId
                                      ,:topic);";

        $this->db->query($sql);
        $this->db->bind(':lesId', $post['lesId'], PDO::PARAM_INT);
        $this->db->bind(':topic', $post['topic'], PDO::PARAM_STR);
        return $this->db->execute();
    }
  }

?>