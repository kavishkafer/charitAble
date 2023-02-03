<?php
class User {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    //Beneficiary
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
    public function addAdmin($data){
        $this->db->query('INSERT INTO registered_users (User_Email,User_Password,User_Role) VALUES(:admin_email, :admin_password,:user_role)');
        $this->db->bind(':admin_email', $data['admin_email']);
        $this->db->bind(':admin_password', $data['admin_password']);
        $this->db->bind(':user_role', $data['user_role']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }     
    }

<<<<<<< HEAD
=======
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
>>>>>>> 017845760a1602476c13936c3c124852ff553da4
    
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

    public function getDonUserId($email){
        $this->db->query('SELECT * FROM registered_users WHERE User_Email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $id=$row->User_Id;
        return $id;
    }
    public function getEhUserId($email){
        $this->db->query('SELECT * FROM registered_users WHERE User_Email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $id=$row->User_Id;
        return $id;
    }

    public function getAdminUserId($email){
        $this->db->query('SELECT * FROM registered_users WHERE User_Email = :admin_email');
        $this->db->bind(':admin_email', $email);
        $row = $this->db->single();
        $id=$row->User_Id;
        return $id;
    }
<<<<<<< HEAD
    public function getAdminDetails($y){
        $this->db->query('SELECT * FROM admin_details WHERE User_Id = :User_Id');
        $this->db->bind(':User_Id', $y);
        $row = $this->db->single();
        return $row;

    }
=======
>>>>>>> 017845760a1602476c13936c3c124852ff553da4

    //Donor
    //Register user
    public function signup_don($data,$x){
        $this->db->query('INSERT INTO donor_details (D_Name, D_Email, D_Tel_no, D_Address, D_password,User_Id) VALUES(:name, :email, :tel_no, :address, :password,:User_Id)');
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':tel_no', $data['tel_no']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':User_Id', $x);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    

    //register event hoster
    public function signup_eh($data,$x){
      $this->db->query('INSERT INTO event_hoster_details (E_Name,E_Email,E_Address,E_Tpno,E_Password,User_Id) VALUES(:name, :email,:address,:telephone, :password,:user_Id)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':telephone', $data['tel_no']);
      $this->db->bind(':password', $data['password']);
     $this->db->bind(':user_Id', $x);
}
    

    




  

    //find user by email
    public function findUserByEmail_don($email){
        $this->db->query('SELECT * FROM donor_details WHERE D_Email = :email');
        //Bind values
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

}
