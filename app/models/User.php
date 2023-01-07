<?php
class User {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        //check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function register($data){
        $this->db->query('INSERT INTO beneficiary_details (B_Name,B_Email,B_Tpno,B_Address,B_Password,otp) VALUES(:name, :email,:telephone_number,:address, :password,:otp)');

        ;
        //bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telephone_number', $data['telephone_number']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':otp', $data['otp']);
        //execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function login($email, $password){
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $hashed_password = $row->B_Password;
        if(password_verify($password, $hashed_password)){
            return $row;
        }else{
            return false;
        }
    }
    public function getUserById($id){
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Id = :B_id');
        $this->db->bind(':B_id', $id);
        $row = $this->db->single();
        return $row;
    }

}