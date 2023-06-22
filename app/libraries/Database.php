<?php

/**
 * Dit is de database class die alle communicatie met de database verzorgt.
 */
/**
 * Dit is de database class die alle communicatie met de database verzorgt.
 */
class Database
{
    // Properties
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;
    private $dbHandler;
    private $statement;

    // Dit is de constructor van de Database class. We maken verbinding met de MySQL server
    public function __construct()
    {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        );

        try {
            //We maken een verbinding met de PDO server door een nieuw PDO object te maken
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch(PDOException $e) {
            echo '<p style="color:red">Er is een database error opgetreden</p>';
            // Handle de foutmelding op de gewenste manier
        }        
    }

    public function query($sql) 
    {
    $this->statement = $this->dbHandler->prepare($sql);
    $this->statement->execute();
    }


    public function bind($parameter, $value, $type = null) 
    {
        if (is_null($type)) {
            switch ($value) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_string($value):
                    $type = PDO::PARAM_STR;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    public function execute() 
    {
        return $this->statement->execute();
    }

    // Deze method geeft een array van objecten terug. Elk object is een record uit de database
    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function single() 
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    public function getStatement()
    {
        return $this->statement;
    }
}