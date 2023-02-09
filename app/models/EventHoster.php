<?php
class EventHoster {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }


    public function getEventHosterDetails(){
        $this->db->query('SELECT * FROM event_hoster_details WHERE status_2 = "approved" ORDER BY E_ID ASC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getRegEvenHostDetails(){
        $this->db->query('SELECT * FROM event_hoster_details WHERE status_2 = "pending" ORDER BY E_ID ASC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function approveRequest($id) {
        $this->db->query('UPDATE event_hoster_details SET status_2 = "approved" WHERE E_ID = :E_ID');
        $this->db->bind(':E_ID', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function denyRequest($id) {
        $this->db->query('DELETE FROM event_hoster_details WHERE E_ID = :E_ID');
        $this->db->bind(':E_ID', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getEventHosterById($id){
        $this->db->query('SELECT * FROM event_hoster_details WHERE E_ID = :E_ID');
        $this->db->bind(':E_ID', $id);

        $row = $this->db->single();

        return $row;
    }
}