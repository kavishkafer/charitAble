<?php

class Profileben
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function profile($id)
    {
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Id = :B_Id');
        $this->db->bind(':B_Id', $id);
        $row = $this->db->single();
        return $row;
    }

}