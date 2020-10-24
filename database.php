<?php

class database{

    private $host;
    private $username;
    private $password;
    private $database;
    private $charset;
    private $db;

    const USER = 1;
    const ADMIN = 2;

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
            exit("Çan't connect to database");
        }
    }

    public function executeQuery($firstname, $middlename, $lastname, $email, $password, $username, $usertype_id=self::USER) {
        try {
            $this->db->beginTransaction();
            
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query1 = "INSERT INTO account (id, username, email, password, usertype_id) VALUES (NULL, :username, :email, :password, :usertype_id)";
            $statement1 = $this->db->prepare($query1);
            $statement1->execute(
                array(
                    'username' => $username,
                    'email' => $_POST["email"],
                    'password' => $password,
                    'usertype_id' => $usertype_id
                )
            );

            $id = $this->db->lastInsertId();
            $query2 = "INSERT INTO persoon (id, firstname, middlename, lastname, account_id) VALUES (NULL, :firstname, :middlename, :lastname, $id)";
            $statement2 = $this->db->prepare($query2);
            $statement2->execute(
                array(
                    'firstname' => $_POST["firstname"],
                    'middlename' => $_POST["middlename"],
                    'lastname' => $_POST["lastname"],
                )
            );

            $this->db->commit();
            header("Location: index.php");
        } catch (PDOException $e) {
            throw $e;
            $this->db->rollback();
        }
    }

    public function login($username, $password) {
        try {
            $this->db->beginTransaction(); 

            $query = "SELECT id, usertype_id, password FROM account WHERE username = :username";

            $statement = $this->db->prepare($query);

            $statement->execute(
                array(
                    'username' => $username
                )
            );

            $rows = $statement->fetchAll(PDO::FETCH_OBJ);

            foreach ($rows as $row) {
            $rowpassword = $row->password;
            }

            if (count($rows) > 0) { 
                $verify = password_verify($password, $rowpassword);

                if ($verify) {
                    session_start();

                    if ($rows[0]->type === 2) {
                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;
                        $_SESSION['row'] = $rows;
                        $_SESSION['type'] = $rows[0]->usertype_id;
                        $_SESSION['loggedin'] = true;

                        header("Location: home.php");
                        echo "Logged in as admin";
                    } else {
                        $_SESSION['username'] = $username;
                        $_SESSION['type'] = $rows[0]->usertype_id;
                        $_SESSION['loggedin'] = true;

                        header("Location: home.php");
                        echo "Logged in as default user";
                    }
                } else {
                    $alert = 'Username and/or password incorrect';
                    $_SESSION['alert'] = $alert;
                }
            } else {
                $alert = 'Username and/or password incorrect';
                $_SESSION['alert'] = $alert;
            }
            $this->db->commit();
        } catch (PDOException $e) {
            throw $e;
        }
    }
}

?>