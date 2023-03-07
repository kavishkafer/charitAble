<?php
class Schedulereqbens extends Controller
{

    public function __construct()
    {
        $this->schedulereqbenModel = $this->model('Schedulereqben');
        $this->userModel = $this->model('User');
        $this->requestModel = $this->model('Schedulereq_don');

    }


    public function index()
    {
        $requests = $this->schedulereqbenModel->getAllRequests();
        $data = [
            'requests' => $requests
        ];

        $this->view('schedulereqbens/index', $data);
    }


    public function acceptRequest($Id)
    {
        /*$c= $_SESSION['user_id'];
        $d =$this->schedulereqbenModel-> getDonId($c);*/
        $this->schedulereqbenModel->getRequestDetails($Id);
        if ($this->schedulereqbenModel->acceptRequest($Id)) {
            flash('request_message', 'Request Accepted');
            redirect('schedulereqbens/index');

        } else {
            die('Something went wrong');
        }
    }

    public function show($id){
        $requests = $this->requestModel->getDRequestById($id);
        $user = $this->userModel->getUserById($requests->B_Id);

        $data = [
            'requests' => $requests,
            'user' => $user
        ];

        if($data['requests']!=null){
            $this->view('schedulereqbens/show', $data);
        } else {
            redirect('schedulereqbens/index');
        }
    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Get existing post from model
            $request = $this->schedulereqbenModel->getAllRequests();
            // Check for owner
            if($request->B_Id != $_SESSION['user_id']){
                redirect('schedulereqbens/index');
            }
            if($this->requestModel->deleteRequest($id)){
                flash('request_message', 'Request Removed');
                redirect('schedulereqbens/index');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('schedulereqbens/index');
        }
    }
}
