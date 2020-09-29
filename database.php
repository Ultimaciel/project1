<?php

class database{

    private $host;
    private $username;
    private $password;
    private $database;
    private $charset;
    private $db;

    public function __construct($host, $username, $password, $database, $charset) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->charset = $charset;
    
        try{
            $dsn = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";
            $this->db = new PDO($dsn, $this->username, $this->password);
        } catch(PDOException $e) {
            echo $e->getMessage();
            exit("An error has occurred");
        }
    }

    public function executeQuery($firstname, $middlename, $lastname, $email, $password, $username) {
        $this->db->beginTransaction();

        try {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query1 = "INSERT INTO account (id, email, password) VALUES (NULL, :email, :password)";
            $statement1 = $this->db->prepare($query1);
            $statement1->execute(
                array(
                    'email' => $_POST["email"],
                    'password' => $password
                )
            );

            $ID = $this->db->lastInsertId();
            $query2 = "INSERT INTO persoon (id, username, firstname, middlename, lastname, account_id) VALUES (NULL, :username, :firstname, :middlename, :lastname, $ID)";
            $statement2 = $this->db->prepare($query2);
            $statement2->execute(
                array(
                    'username' => $_POST["username"],
                    'firstname' => $_POST["firstname"],
                    'middlename' => $_POST["middlename"],
                    'lastname' => $_POST["lastname"]
                )
            );

            $this->db->commit();
            header("Location: index.php");
        } catch (PDOException $e) {
            throw $e;
            $this->db->rollback();
        }
    }
}

?>