<?php
class Request_eh {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getEventRequests(){

        $this->db->query('SELECT s.*, e.*, b.B_Name
                  FROM event_request_table s
                  INNER JOIN event_hoster_details e ON s.E_ID = e.E_ID AND ' . $_SESSION['user_id'] . ' = e.User_Id
                  INNER JOIN beneficiary_details b ON s.B_id = b.B_Id
                  WHERE s.accepted = false AND s.completed = false');

        $results = $this->db->resultSet();

        return $results;
    }


    public function getRecentEventReq(){

        $this->db->query('SELECT s.*, d.*, b.B_Name
                  FROM event_request_table s
                  INNER JOIN event_hoster_details d ON s.E_ID = d.E_ID AND ' . $_SESSION['user_id'] . ' = d.User_Id
                  INNER JOIN beneficiary_details b ON s.B_id = b.B_Id
                  WHERE s.accepted = true AND s.completed = false');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getAllRequests(){
        $this->db->query('SELECT * FROM event_request_table');

        /*$this->db->bind(':B_Id', $ben_id);*/
        $results = $this->db->resultSet();

        return $results;
    }

    public function getEventRequestById($id)
    {
        $this->db->query('SELECT * FROM event_request_table WHERE Event_ID = :Event_ID');
        $this->db->bind(':Event_ID', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getEhId($id){
        $this->db->query('SELECT * FROM event_hoster_details WHERE User_Id = :User_Id');
        $this->db->bind(':User_Id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function eventRequests($data){
        $this->db->query('INSERT INTO event_request_table (document,Event_Name, Event_Date, Event_Time, Event_Description, E_ID, B_Id) VALUES(:document, :event_name, :event_date, :event_time, :event_description, :E_ID, :B_Id)');
        //Bind values
        $this->db->bind(':document', $data['document_name']);
        $this->db->bind(':event_name', $data['event_name']);
        $this->db->bind(':event_date', $data['event_date']);
        $this->db->bind(':event_time', $data['event_time']);
        $this->db->bind(':event_description', $data['event_description']);
        $this->db->bind(':E_ID', $data['user_id']);
        $this->db->bind(':B_Id', $data['B_id']);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }



    public function updateEventRequests($data){
        $this->db->query('UPDATE event_request_table SET document = :document, Event_Name = :Event_Name, Event_Date = :Event_Date, Event_Time = :Event_Time, Event_Description = :Event_Description WHERE Event_ID = :Event_ID');
        //Bind values
       if (isset($data['document_name'])) {
         $this->db->bind(':document', $data['document_name']);
            $this->db->bind(':Event_Name', $data['Event_Name']);
            $this->db->bind(':Event_Date', $data['Event_Date']);
            $this->db->bind(':Event_Time', $data['Event_Time']);
            $this->db->bind(':Event_Description', $data['Event_Description']);
            $this->db->bind(':Event_ID', $data['Event_ID']);
        }
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteRequest($id){
        $this->db->query('DELETE FROM event_request_table where Event_ID = :Event_ID');
        // Bind values
        $this->db->bind(':Event_ID', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getBeneficiaries(){
        $this->db->query('SELECT * FROM beneficiary_details WHERE status_2 = "approved" ORDER BY B_Id DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getBeneficiaryDetailsByType($B_Type) {
        $this->db->query('SELECT * FROM beneficiary_details WHERE status_2 = "approved" AND B_Type = :B_Type ORDER BY B_Id DESC');
        $this->db->bind(':B_Type', $B_Type);
        $results = $this->db->resultSet();
        return $results;
    }




    public function getBenById($id){
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Id = :B_Id');
        $this->db->bind(':B_Id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function totalRequestsByEh($id){
        $this->db->query('Select *  FROM event_request_table WHERE E_ID = :E_ID');
        $this->db->bind(':E_ID', $id);
        $count=$this->db->resultSet();
        return $this->db->rowCount();


    }
    public function pendingRequestsEh($id){
        $this->db->query('SELECT * from event_request_table Where E_ID = :E_ID AND accepted = false AND completed = false');
        $this->db->bind(':E_ID', $id);
        $count=$this->db->resultset();
        return $this->db->rowCount();
    }
    public function completedRequestsEh($id){
        $this->db->query('Select * from event_request_table Where E_ID = :E_ID AND accepted = true AND completed = true');
        $this->db->bind(':E_ID', $id);
        $count=$this->db->resultset();
        return $this->db->rowCount();
    }
    public function acceptedRequestsEh($id){
        $this->db->query('Select * from event_request_table Where E_ID = :E_ID AND accepted = true AND completed = false');
        $this->db->bind(':E_ID', $id);
        $count=$this->db->resultset();
        return $this->db->rowCount();
    }
    public function completedRequestsEhDetails($id){
        $this->db->query('SELECT s.*, e.*, b.B_Name
                  FROM event_request_table s
                  INNER JOIN event_hoster_details e ON s.E_ID = e.E_ID AND ' . $_SESSION['user_id'] . ' = e.User_Id
                  INNER JOIN beneficiary_details b ON s.B_id = b.B_Id
                  WHERE s.accepted = TRUE AND s.completed = true');

        $results = $this->db->resultSet();

        return $results;
    }



    public function AcceptedRequestsEhDetails($id){
        $this->db->query('Select * from event_request_table Where E_ID = :E_ID AND accepted = true AND completed = false');
        $this->db->bind(':E_ID', $id);
        $array=$this->db->resultset();
        return $array;
    }

    public function pendingRequestsEhDetails($id){
        $this->db->query('Select * from event_request_table Where E_ID = :E_ID AND accepted = false AND completed = false');
        $this->db->bind(':E_ID', $id);
        $array=$this->db->resultset();
        return $array;
    }



    //  public function get_meals(){
    //     $this->db->query('SELECT Event_ID, Time, D_Date FROM event_request_table');
    //     $results = $this->db->resultSet();

    //     $count = mysqli_num_rows($results);
    //     if($count > 0){
    //         $data_arr = array();
    //         $i=1;
    //         while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
    //             $data_arr[$i]['reqID'] = $data_row['Event_ID'];
    //             $data_arr[$i]['title'] = $data_row['Time'];
    //             $data_arr[$i]['date'] = date("Y-m-d", strtotime($data_row['D_Date']));
    //             $i++;
    //           }
    //           $data = array(
    //                       'status' => true,
    //                       'msg' => 'successfully!',
    //                       'data' => $data_arr
    //                   );
    //         }
    //         else {
    //           $data = array(
    //                       'status' => false,
    //                       'msg' => 'Error!'
    //                   );
    //         }
    //         echo json_encode($data);
    // }


}