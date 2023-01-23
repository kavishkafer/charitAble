<?php

class Verify_model extends Database{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @param $otp
     * @return false|mixed
     */
    public function verifyOTP($otp){
        $this->db->query('SELECT * FROM `beneficiary_details` WHERE `otp` = :otp');

        $this->db->bind(':otp', $otp);

        $row = $this->db->single();
        if($this->db->rowCount()>0){
            return $row;
        }
        else{
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function verify($id){
        $this->db->query('UPDATE `beneficiary_details` SET `status` = :status, `otp` = :otp WHERE `B_Id` = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', true);
        $this->db->bind(':otp', '0');

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}