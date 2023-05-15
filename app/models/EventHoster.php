<?php
class EventHoster {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }

    public function getEventHosterDetails(){
        $this->db->query('SELECT * FROM event_hoster_details WHERE status_2 = "approved" ORDER BY E_ID ASC' );
        $results = $this->db->resultSet();
        return $results;
    }


    public function getTotalEventHosters(){
        $this->db->query('SELECT COUNT(*) as total FROM event_hoster_details WHERE status_2 = "approved"');
        $result = $this->db->single();
        return $result->total;
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

    public function getPendingEventCount($id){
        $results = $this->db->query('SELECT * FROM event_request_table WHERE E_ID = :E_ID AND Accepted = 1 AND Completed = 0 ');
        $this->db->bind(':E_ID', $id);
        $count = $this->db->resultSet();
        return $this->db->rowCount();
    }
    public function getCompletedEventCount($id){
        $results = $this->db->query('SELECT * FROM event_request_table WHERE E_ID = :E_ID AND Accepted = 1 AND Completed = 1 ');
        $this->db->bind(':E_ID', $id);
        $count = $this->db->resultSet();
        return $this->db->rowCount();
    }
}