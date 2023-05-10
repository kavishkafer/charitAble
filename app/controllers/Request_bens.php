<?php
use helpers\email;
class Request_bens extends Controller{

    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $this->requestModel = $this->model('Request_ben');
        $this->userModel = $this->model('User');
    }
    public function index(){
        $requests = $this->requestModel->getRequests();
        $row=$this->requestModel->getBenId($_SESSION['user_id']);
        $count=$this->requestModel->totalRequestsByBen($row->B_Id);
        $accept=$this->requestModel->acceptedRequestsBen($row->B_Id);
        $complete=$this->requestModel->completedRequestsBen($row->B_Id);
        $pending=$this->requestModel->pendingRequestsBen($row->B_Id);
        $data=[
            'requests' => $requests,
            'count' => $count,
            'accept' => $accept,
            'complete' => $complete,
            'pending' => $pending
        ];

        
        $this->view('request_bens/index', $data);
    }

    public function requests(){
        $row=$this->requestModel->getBenId($_SESSION['user_id']);
        $completed = $this->requestModel->CompletedRequestsBenDetails($row->B_Id);
        $accepted = $this->requestModel->AcceptedRequestsBenDetails($row->B_Id);
        $data=[
            'completed' => $completed,
            'accepted' => $accepted
        ];

        $this->view('request_bens/request',$data);
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
                'Donation_Details' => trim($_POST['Donation_Details']),
                // 'Donation_Status' => trim($_POST['Donation_Status']),
                'user_id' => $y->B_Id,
                'Donation_Description_err' => '',
                'Donation_Quantity_err' => '',

                'Donation_Type_err' => '',
                'Donation_Priority_err' => '',
                'Donation_Details_err' => ''
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
            if($data['Donation_Quantity']<=0){
                $data['Donation_Quantity_err'] = 'Please enter Quantity greater than 0';
            }
            else{
                $data[ 'Donation_Quantity' ]= trim($_POST['Donation_Quantity']);
            }
            if(empty($data['Donation_Details'])){
                $data['Donation_Details_err'] = 'Please enter Donation details';
            }
            else{
                $data[ 'Donation_Details' ]= trim($_POST['Donation_Details']);
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
                    if($data['Donation_Priority']=='High') {
                        $donors=$this->requestModel->getNearDonors($y->latitude, $y->longitude);
                        foreach ($donors as $donor) {
                            $email = new Email($donor->D_Email);
                            $email->sendHighPriorityEmail();

                        }


                        redirect('request_bens');
                    }
                    else{
                        redirect('request_bens');
                    }

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
                'Donation_Details' => '',
                'Donation_Description_err' => '',
                'Donation_Quantity_err' => '',
                'Donation_Type_err' => '',
                'Donation_Priority_err' => '',
                'Donation_Details_err' => ''
            ];
            $this->view('request_bens/add', $data);
        }
      
    }
    public function show($id){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        
        $request = $this->requestModel->getRequestById($id);
        $user = $this->userModel->getBenDetailsById($request->B_Id);

        if($this->requestModel->partialDonorId($id)!=null) {
            $partialUser = $this->requestModel->partialDonorId($id);
            $partial = $this->requestModel->partialRequestsDetails($partialUser->Req_Id);
            $data = [
                'request' => $request,
                'user' => $user,
                'partial' => $partial,
                'partialUser' => $partialUser
            ];
        }
        elseif($request->Accepted==1){
            $donor = $this->userModel->getDUserById($request->D_Id);
            $data = [
                'request' => $request,
                'user' => $user,
                'partial' => null,
                'partialUser' => null,
                'donor' => $donor
            ];
        }else{
            $data = [
                'request' => $request,
                'user' => $user,
                'partial' => null,
                'partialUser' => null
            ];
        }
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
                'Donation_Details' => trim($_GET['Donation_Details']),
                'user_id' => $y->B_Id,
                'Donation_Description_err' => '',
                'Donation_Quantity_err' => '',
                'Donation_Type_err' => '',
                'Donation_Priority_err' => '',
                'Donation_Details_err'=>''

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
            if(empty($data['Donation_Details'])){
                $data['Donation_Details_err'] = 'Please enter Donation Details';
            }
            // Make sure no errors
            if(empty($data['Donation_Description_err']) && empty($data['Donation_Quantity_err']) && empty($data['Donation_Type_err']) && empty($data['Donation_Priority_err']) && empty($data['Donation_Details_err'])){
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
                'Donation_Details' => $request->Donation_Details

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
    public function completePartialRequest($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Get existing post from model
            $reqId= $this->requestModel->getReqIdpartial($id);
            $request = $this->requestModel->getRequestById($reqId->Req_Id);



            if($this->requestModel->partialDonorId($reqId->Req_Id)!=null) {
                $partialUser = $this->requestModel->partialDonorId($reqId->Req_Id);
                $partial = $this->requestModel->partialRequestsDetails($reqId->Req_Id);
                $data = [
                    'user' => $user,
                    'partial' => $partial,
                    'partialUser' => $partialUser
                ];
                $this->requestModel->completePartialRequest($id);
                redirect('request_bens/show/'.$reqId->Req_Id);
            }

             else {
                die('Something went wrong');
            }
        } else {
            redirect('request_bens');
        }
    }
    public function completeFullRequest($id){
if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Get existing post from model
           $request = $this->requestModel->getRequestById($id);
           $user = $this->userModel->getBenDetailsById($request->B_Id);




                $data = [
                    'user' => $user,
                    'request' => $request,

                ];
                $this->requestModel->completeFullRequest($id);
                redirect('request_bens/show/'.$id);
            }


         else {
            redirect('request_bens');
        }
    }


}
