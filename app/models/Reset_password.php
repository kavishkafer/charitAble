<?php
class Reset_password {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function deleteToken($userEmail){
        $this->db->query('DELETE FROM pwdReset WHERE pwdResetEmail = :email');
        $this->db->bind(':email', $userEmail);
        $this->db->execute();
    }

    public function insertToken($selector, $token, $expires, $userEmail){
        
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        $this->db->query('INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (:email, :selector, :token, :expires)');
        $this->db->bind(':email', $userEmail);
        $this->db->bind(':selector', $selector);
        $this->db->bind(':token', $hashedToken);
        $this->db->bind(':expires', $expires);
        $this->db->execute();
    }
    public function getToken($selector, $validator){
        $currentDate = date("U");
        $this->db->query(' SELECT * FROM pwdreset WHERE pwdResetSelector = :selector AND pwdResetExpires >= NOW()');
        $this->db->bind(':selector', $selector);
      /*  $row = $this->db->fetch();
        if ($row && password_verify($validator, $row['pwdResetToken'])) {
            return $row;
        } else {
            return false;
        }*/
        $row = $this->db->single();
        return $row;
    }
    public function updatePassword($password, $userEmail){
        $this->db->query('UPDATE registered_users SET User_Password = :password WHERE User_Email = :email');
        $this->db->bind(':password', $password);
        $this->db->bind(':email', $userEmail);
        $this->db->execute();
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

}