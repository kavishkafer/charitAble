<?php
class SettingsEh{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function updateProfile($data){
        $id= $_SESSION['user_id'];

        $this->db->query('UPDATE event_hoster_details SET E_Name = :E_Name, E_Address = :E_Address, E_Tpno = :E_Tpno WHERE User_Id = :id');

        //bind values
        $this->db->bind(':E_Name', $data['E_Name']);
        $this->db->bind(':E_Address', $data['E_Address']);
        $this->db->bind(':E_Tpno', $data['E_Tpno']);
        $this->db->bind(':E_Address', $data['E_Address']);
        $this->db->bind(':id', $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }


    }

}