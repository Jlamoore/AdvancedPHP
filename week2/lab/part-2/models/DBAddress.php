<?php

/**
 * Description of DBAddress
 *
 * @author 001393760
 */
class DBAddress {

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

}
