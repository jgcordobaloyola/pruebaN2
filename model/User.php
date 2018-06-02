<?php

include '../config/Connect.php';

class User {

    public $id = "";
    public $email = "";
    public $password = "";

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    public function viewIdUser(){
        $db = new DataBase();
        $conn = $db->connect();
        
        if ($conn) {
            $user_id2= "select id from user where email='".$this->email."'";
            
            if ($conn->query($user_id2)===TRUE) {
                return;
            }
        }
    }
    public function addUser() {
        $db = new DataBase();
        $conn = $db->connect();



        if ($conn) {
            $sql = "INSERT INTO USER (email,password) VALUES ("
                    . "'" . $this->email . "','" . $this->password . "')";

            if ($conn->query($sql) === TRUE) {
                return array(TRUE, $this->toJSON());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }
    
    public function delUser() {
        $db = new DataBase();
        $conn = $db->connect();

        if ($conn) {
            $sql = "DELETE FROM user where id=" . $this->id . ";";

            if ($conn->query($sql) === TRUE) {
                return array(TRUE, $this->toJSON());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }
    
    
    
    public function updateUser() {
        $db = new DataBase();
        $conn = $db->connect();

        if ($conn) {
            $sql = "update user "
                    . "set email ='" . $this->nombre . "',"
                    . "password ='" . $this->codigo . "',"
                    . "where id=" . $this->id . ";";

            if ($conn->query($sql) === TRUE) {
                return array(TRUE, $this->toJSON());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }
    

    function toJSON() {
        $arr = array(
            'id' => $this->id,
            'email' => $this->email,
            'password' => $this->password,
        );
        return json_encode($arr);
    }

    function toArray() {
        $arr = array(
            'id' => $this->id,
            'nombre' => $this->email,
            'codigo' => $this->password,
        );
        return $arr;
    }

}
