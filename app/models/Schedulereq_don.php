<?php
class Schedulereq_don {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getRequests(){
        $this->db->query('SELECT * FROM shedule_request_table
        INNER JOIN donor_details
        ON `shedule_request_table`.`D_Id` = `donor_details`.`D_Id` AND ' . $_SESSION['user_id'] . ' = `donor_details`.`User_Id` ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getDRequestByID($id)
    {
        $this->db->query('SELECT * FROM shedule_request_table WHERE B_Req_ID = :B_Req_ID');
        $this->db->bind(':B_Req_ID', $id);
        $row = $this->db->single();
        return $row;
    }
    public function getDonId($id){
        $this->db->query('SELECT * FROM donor_details WHERE User_Id = :User_Id');
        $this->db->bind(':User_Id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function addRequests($data){
        $this->db->query('INSERT INTO shedule_request_table (D_Name, D_Tel_No, D_Address, Food_Type, D_Date, Time, Donation_Quantity, D_Id) VALUES(:D_Name, :D_Tel_No, :D_Address, :Food_Type, :D_Date, :Time, :Donation_Quantity, :D_Id)');
        //Bind values
        $this->db->bind(':D_Name', $data['D_Name']);
        $this->db->bind(':D_Tel_No', $data['D_Tel_No']);
        $this->db->bind(':D_Address', $data['D_Address']);
        $this->db->bind(':Food_Type', $data['Food_Type']);
        $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);
        $this->db->bind(':D_Date', $data['D_Date']);
        $this->db->bind(':Time', $data['Time']);
        $this->db->bind(':D_Id', $data['user_id']);



        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateRequests($data){
        $this->db->query('UPDATE shedule_request_table SET D_Name = :D_Name, D_Tel_No = :D_Tel_No, D_Address = :D_Address, Food_Type = :Food_Type, D_Date = :D_Date, Time = :Time, Donation_Quantity = :Donation_Quantity WHERE B_Req_ID = :B_Req_ID');
        //Bind values
        if (isset($data['D_Name'])) {
        $this->db->bind(':D_Name', $data['D_Name']);
        $this->db->bind(':D_Tel_No', $data['D_Tel_No']);
        $this->db->bind(':D_Address', $data['D_Address']);
        $this->db->bind(':Food_Type', $data['Food_Type']);
        $this->db->bind(':Donation_Quantity', $data['Donation_Quantity']);
        $this->db->bind(':D_Date', $data['D_Date']);
        $this->db->bind(':Time', $data['Time']);
        $this->db->bind(':B_Req_ID', $data['B_Req_ID']);
        
        }
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteRequest($id){
        $this->db->query('DELETE FROM shedule_request_table where B_Req_ID = :B_Req_ID');
        // Bind values
        $this->db->bind(':B_Req_ID', $id);
        
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getNames(){
        $this->db->query('SELECT * FROM beneficiary_details');

        $results = $this->db->resultSet();

        return $results;
    }

        

    ///////////
    public function getBenById($id){
        $this->db->query('SELECT * FROM beneficiary_details WHERE B_Id = :B_Id');
        $this->db->bind(':B_Id', $id);
        $row = $this->db->single();
        return $row;
    }



    public function get_meals(){
        $this->db->query('SELECT B_Req_ID, Time, D_Date FROM shedule_request_table');
        $results = $this->db->resultSet();

        $count = mysqli_num_rows($results);
        if($count > 0){
            $data_arr = array();
            $i=1;
            while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) { 
                $data_arr[$i]['B_Req_ID'] = $data_row['B_Req_ID'];
                $data_arr[$i]['Time'] = $data_row['Time'];
                $data_arr[$i]['D_Date'] = date("Y-m-d", strtotime($data_row['D_Date']));
                $i++;
              }
              $data = array(
                          'status' => true,
                          'msg' => 'successfully!',
                          'data' => $data_arr
                      );
            }
            else {
              $data = array(
                          'status' => false,
                          'msg' => 'Error!'       
                      );
            }
            echo json_encode($data);
    }

    
 }

    

