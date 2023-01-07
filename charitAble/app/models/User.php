<?php
class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Register User
    // public function register($data){
    //     $this->db->query('INSERT INTO users (name, email,password) VALUES(:name, :email, :password)');
    //     // Bind values
    //     $this->db->bind(':name', $data['name']);
    //     $this->db->bind(':email', $data['email']);
    //     $this->db->bind(':password', $data['password']);

    //     // Execute
    //     if($this->db->execute()){
    //         return true;
    //     } else {
    //         return false; 
    //     }
    // }

    // Login User
    public function login($admin_email, $admin_password){
        $this->db->query('SELECT * FROM admin_details WHERE admin_email = :admin_email');
        $this->db->bind(':admin_email', $admin_email);

        $row = $this->db->single();

        $hashed_password = $row->admin_password;
        if(password_verify($admin_password, $hashed_password)){
            return $row;
        } else {
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($admin_email){
        $this->db->query('SELECT * FROM admin_details WHERE admin_email = :admin_email');
        // Bind value
        $this->db->bind(':admin_email', $admin_email);

        $row = $this->db->single();

        // Check row 
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

}


?>