<?php

class User {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checkEmail($email) {
        $this->db->query("SELECT email FROM users WHERE email = :e");
        $this->db->bind(":e", $email);

        if($this->db->resultado()):
            return true;
        else:
            return false;
        endif;
    }

    public function insert($dados) {
        $this->db->query("INSERT INTO users(name_user, email, pass) VALUES (:name_user, :email, :pass)");
        $this->db->bind("name_user", $dados['name_user']);
        $this->db->bind("email", $dados['email']);
        $this->db->bind("pass", $dados['pass']);

        if($this->db->executa()):
            return true;
        else:
            return false;
        endif;
    }

    public function checkLogin($email, $pass) {
        $this->db->query("SELECT * FROM users WHERE email = :e");
        $this->db->bind(":e", $email);

        if($this->db->resultado()):
            $resultado = $this->db->resultado();
            if(password_verify($pass, $resultado->pass)):
                return $resultado;
            else:
                return false;
            endif;
        else:
            return false;
        endif;
    }

    public function readUserById($id) {
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->resultado();
    }
}