<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginResoruce
 *
 * @author 001393760
 */
class LoginResoruce extends DBSpring implements IRestModel {

    public function delete($id) {
        
    }

    public function get($id) {
        
    }

    public function getAll() {
        
    }

    public function post($serverData) {
        $stmt = $this->getDb()->prepare("SELECT password FROM users where email = :email");
        $binds = array(":email" => $serverData['email']
        );
        $results = '';
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return (password_verify($serverData['password'], $results['password']));
    }

    public function put($serverData, $id) {
        
    }

//put your code here
}
