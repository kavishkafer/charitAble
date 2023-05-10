<?php
class Eventreqbens extends Controller
{

    public function __construct()
    {
        $this->eventreqbenModel = $this->model('Eventreqben');
        $this->userModel = $this->model('User');
        $this->requestModel = $this->model('Request_eh');

    }


    public function index()
    {
        $requests = $this->eventreqbenModel->getAllRequests();
        $data = [
            'requests' => $requests
        ];

        $this->view('eventreqbens/index', $data);
    }


    public function acceptRequest($Id)
    {
        /*$c= $_SESSION['user_id'];
        $d =$this->schedulereqbenModel-> getDonId($c);*/
        $this->eventreqbenModel->getRequestDetails($Id);
        if ($this->eventreqbenModel->acceptRequest($Id)) {
            flash('request_message', 'Request Accepted');
            redirect('eventreqbens/index');

        } else {
            die('Something went wrong');
        }
    }

    public function show($id){
        $requests = $this->requestModel->getEventRequestById($id);
        $user = $this->userModel->getUserById($requests->E_ID);

        $data = [
            'requests' => $requests,
            'user' => $user
        ];

        if($data['requests']!=null){
            $this->view('eventreqbens/show', $data);
        } else {
            redirect('eventreqbens/index');
        }
    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Get existing post from model
            $request = $this->eventreqbenModel->getAllRequests();
            // Check for owner
            if($request->B_Id != $_SESSION['user_id']){
                redirect('eventreqbens/index');
            }
            if($this->requestModel->deleteRequest($id)){
                flash('request_message', 'Request Removed');
                redirect('eventreqbens/index');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('eventreqbens/index');
        }
    }


    public function get_events(){
        $requests = $this->ehRequestModel->getAllRequests();
        $data = [
            'requests' => $requests,
        ];
        echo json_encode($data);
    }
}
