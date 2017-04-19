<?php

/**
 * Base DB class. Get a connection to the DB
 * @author 001393760
 */
class DB {

    protected $db = null;
    protected $DNS = 'mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2017';
    protected $user = 'root';
    protected $password = '';

    public function getDB() {
        if (null != $this->db) {
            return $this->db;
        }
        try {
            $this->db = new PDO($this->DNS, $this->user, $this->password);
        } catch (Exception $ex) {
            $this->closeDB();
            throw new DBException($ex->getMessage());
        }
        return $this->db;
    }

    public function getAllEmails() {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT email FROM users");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }

    public function createLogin($email, $password) {
        $db = $this->getDB();
        $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = :created");
        $binds = array(
            ":email" => $email,
            ":password" => $password,
            ":created" => date("Y-m-d"),
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }

    public function closeDB() {
        $this->db = null;
    }

}
