<?php
class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //register user
    public function signup_eh($data){
        $this->db->query('INSERT INTO event_hoster_details (E_Name, E_Email, E_Address, E_Tpno, E_Password) VALUES(:name, :email, :address, :telephone_number, :password)');
        
        //bind values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':telephone_number', $data['telephone_number']);
        $this->db->bind(':password', $data['password']);
        
        //execute
        if($this->db->execute()){
                return true;
        }else {
            return false;
        }
    }

    //find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM event_hoster_details WHERE email = :email');
        
        //bind values
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
}
