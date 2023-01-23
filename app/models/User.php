<?php
class User {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM registered_users WHERE User_Email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        //check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function register($data,$x){
        $this->db->query('INSERT INTO beneficiary_details (B_Name,B_Email,B_Tpno,B_Address,B_Password,otp,User_Id) VALUES(:name, :email,:telephone_number,:address, :password,:otp,:User_Id)');
        
       

        
        //bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telephone_number', $data['telephone_number']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':otp', $data['otp']);
        $this->db->bind(':User_Id', $x);
        
      
        
        //execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
        public function regcom($data){
            $this->db->query('INSERT INTO registered_users (User_Email,User_Password,User_Role) VALUES(:email, :password,:user_role)');
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':user_role', $data['user_role']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
           
        }
    
    public function login($email, $password){
        $this->db->query('SELECT * FROM registered_users WHERE User_Email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $hashed_password = $row->User_Password;
        if(password_verify($password, $hashed_password)){
            return $row;
        }else{
            return false;
        }
        
    }
    public function findUserRoleByEmail($email){
        $this->db->query('SELECT * FROM registered_users WHERE User_Email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        //check row
        if($this->db->rowCount() > 0){
            $row=$this->db->single();
            $userrole=$row->User_Role;
            return $userrole;
        }else{
            return null;
        }
    }
    public function getUserById($id){
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Id = :B_id');
        $this->db->bind(':B_id', $id);
        $row = $this->db->single();
        return $row;
    }
    public function getBenUserId($email){
        $this->db->query('SELECT * FROM registered_users WHERE User_Email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $id=$row->User_Id;
        return $id;
    }

}