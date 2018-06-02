<?php

include '../config/Connect.php';

class Detail {

    public $genero = "";
    public $situacion_sentimental = "";
    public $fecha_nacimiento = "";
    public $user_id = "";

    function getGenero() {
        return $this->genero;
    }

    function getSituacion_sentimental() {
        return $this->situacion_sentimental;
    }

    function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    function getUser_id() {
        return $this->user_id;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setSituacion_sentimental($situacion_sentimental) {
        $this->situacion_sentimental = $situacion_sentimental;
    }

    function setFecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    //ayuda insert detail
    //INSERT INTO `detail`(`genero`, `situacion_sentimental`, `fecha_nacimiento`, `user_id`) 
    //VALUES ('M','Casado','1990-12-28',3)


    public function addDetail() {
        $db = new DataBase();
        $conn = $db->connect();

        if ($conn) {    
            
            $usr = new User();
            $usr_id = $usr->getId();
            
            $sql = "INSERT INTO detail( 'genero', 'situacion_sentimental', "
                    . "'fecha_nacimiento', 'user_id') VALUES "
                    . "'" . $this->genero . "','" . $this->situacion_sentimental . "','" . $this->fecha_nacimiento . "',"
                    . "$this->user_id);";
            
            if ($conn->query($sql) === TRUE) {
                return array(TRUE, $this->toJSON());
            } else {
                return array(FALSE, $conn->error);
            }
        }
    }

    function listarDetail() {
        $details = [];

        $db = new DataBase();
        $conn = $db->connect();
        if ($conn) {
            $sql = "SELECT d.id, u.email ,d.genero FROM detail as d inner join user as u on u.id= d.user_id "
                    . "WHERE d.user_id=$this->user_id";
            if ($conn->query($sql)) {
                $rs = $conn->query($sql);
                // print_r(mysqli_fetch_assoc($rs));
                while ($fila = mysqli_fetch_assoc($rs)) {

                    $d = new Detail();
                    $d->setId($fila['id']);
                    $d->setGenero($genero);
                    $d->setUser_id($user_id);

                    array_push($details, $d);
                }
                return $details;
            }
        }
    }
    
    public function updateDetail() {
        $db = new DataBase();
        $conn = $db->connect();

        if ($conn) {
            $sql = "update detail "
                    . "set genero ='" . $this->genero . "',"
                    . "situacion_sentimental ='" . $this->situacion_sentimental . "',"
                    . "fecha_nacimiento ='" . $this->fecha_nacimiento . "',"
                    . "fecha_nacimiento ='" . $this->fecha_nacimiento . "',"
                    . "user_id ='" . $this->user_id . "',"
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
            'email' => $this->genero,
            'situacion_sentimental' => $this->situacion_sentimental,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'user_id' => $this->user_id,
        );
        return json_encode($arr);
    }

    function toArray() {
        $arr = array(
            'id' => $this->id,
            'email' => $this->genero,
            'situacion_sentimental' => $this->situacion_sentimental,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'user_id' => $this->user_id,
        );
        return $arr;
    }

}
