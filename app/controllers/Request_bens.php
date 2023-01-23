<?php
class Request_bens extends Controller{
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login_ben');
        }
        $this->requestModel = $this->model('Request_ben');
        $this->userModel = $this->model('User');
    }
    public function index(){
        $requests = $this->requestModel->getRequests();
        $data=[
            'requests' => $requests
        ];

        
        $this->view('request_bens/index', $data);
    }
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $a= $_SESSION['user_id'];
            $y =$this->requestModel-> getBenId($a);
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'Donation_Description' => trim($_POST['Donation_Description']),
                'Donation_Quantity' => trim($_POST['Donation_Quantity']),
                'Donation_Type' => trim($_POST['Donation_Type']),
                'Donation_Priority' => trim($_POST['Donation_Priority']),
                // 'Donation_Status' => trim($_POST['Donation_Status']),
                'user_id' => $y->B_Id,
                'Donation_Description_err' => '',
                'Donation_Quantity_err' => '',
                'Donation_Type_err' => '',
                'Donation_Priority_err' => ''
            ];
            // Validate data
            if(empty($data['Donation_Description'])){
                $data['Donation_Description_err'] = 'Please enter description';
              
            }
            else{
                
                $data[ 'Donation_Description' ]= trim($_POST['Donation_Description']);
            }
            if(empty($data['Donation_Quantity'])){
                $data['Donation_Quantity_err'] = 'Please enter Quantity';
            }
            else{
                $data[ 'Donation_Quantity' ]= trim($_POST['Donation_Quantity']);
            }
            if(empty($data['Donation_Type'])){
                $data['Donation_Type_err'] = 'Please enter Donation type';
            }
            else{
                $data[ 'Donation_Type' ]= trim($_POST['Donation_Type']);
            }
            if(empty($data['Donation_Priority'])){
                $data['Donation_Priority_err'] = 'Please enter Donation priority';
            }
            else{
                $data[ 'Donation_Priority' ]= trim($_POST['Donation_Priority']);
            }
            // Make sure no errors
            if(empty($data['Donation_Description_err']) && empty($data['Donation_Quantity_err']) && empty($data['Donation_Type_err']) && empty($data['Donation_Priority_err'])){
                // Validated
                if($this->requestModel->addRequests($data)){
                    flash('request_message', 'Request Added');
                    redirect('request_bens');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('request_bens/add', $data);
            }
        } else {
            $data = [
                'Donation_Description' => '',
                'Donation_Quantity' => '',
                'Donation_Type' => '',
                'Donation_Priority' => '',
                'Donation_Description_err' => '',
                'Donation_Quantity_err' => '',
                'Donation_Type_err' => '',
                'Donation_Priority_err' => ''
            ];
            $this->view('request_bens/add', $data);
        }
      
    }
    public function show($id){
        
        $request = $this->requestModel->getRequestById($id);
        $user = $this->userModel->getUserById($request->B_Id);
        $data = [
            'request' => $request,
            'user' => $user
        ];
        if($data['request']!=null){
        $this->view('request_bens/show', $data);
        } else {
            redirect('request_bens');
        }
    }

    public function edit($id){
        $a= $_SESSION['user_id'];
        $y =$this->requestModel-> getBenId($a);
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
           
           

            $data = [
                'Donation_ID' => $id,
                'Donation_Description' => trim($_GET['Donation_Description']),
                'Donation_Quantity' => trim($_GET['Donation_Quantity']),
                'Donation_Type' => trim($_GET['Donation_Type']),
                'Donation_Priority' => trim($_GET['Donation_Priority']),
                'user_id' => $y->B_Id,
                'Donation_Description_err' => '',
                'Donation_Quantity_err' => '',
                'Donation_Type_err' => '',
                'Donation_Priority_err' => ''

            ];
        
            // Validate data
            if(empty($data['Donation_Description'])){
                $data['Donation_Description_err'] = 'Please enter description';
            }
            if(empty($data['Donation_Quantity'])){
                $data['Donation_Quantity_err'] = 'Please enter Quantity';
            }
            if(empty($data['Donation_Type'])){
                $data['Donation_Type_err'] = 'Please enter Donation type';
            }
            if(empty($data['Donation_Priority'])){
                $data['Donation_Priority_err'] = 'Please enter Donation priority';
            }
            // Make sure no errors
            if(empty($data['Donation_Description_err']) && empty($data['Donation_Quantity_err']) && empty($data['Donation_Type_err']) && empty($data['Donation_Priority_err'])){
                // Validated
                if($this->requestModel->updateRequest($data)){
                    flash('request_message', 'Request Updated');
                    redirect('request_bens');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('request_bens/edit', $data);
            }
        } else {
           
            
            $request = $this->requestModel->getRequestById($id);
            // Check for owner
            if($request->B_Id != $y->B_Id){
                redirect('request_bens');
            }
            $data = [
                'Donation_ID' => $id,
                'Donation_Description' => $request->Donation_Description,
                'Donation_Quantity' => $request->Donation_Quantity,
                'Donation_Type' => $request->Donation_Type,
                'Donation_Priority' => $request->Donation_Priority,

            ];
            $this->view('request_bens/edit', $data);
    }

    }
    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Get existing post from model
            $request = $this->requestModel->getRequestById($id);
            // Check for owner
            if($request->B_Id != $_SESSION['user_id']){
                redirect('request_bens');
            }
            if($this->requestModel->deleteRequest($id)){
                flash('request_message', 'Request Removed');
                redirect('request_bens');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('request_bens');
        }
    }
}
