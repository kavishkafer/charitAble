<?php
class Profilebens extends Controller
{
    public function __construct()
    {

        /*if(!isLoggedIn()){
            redirect('users/login');
        }*/
        $this->userModel = $this->model('User');
        $this->profileModel = $this->model('Profileben');
    }

    public function index($id)
    {
        $requests = $this->profileModel->profile($id);
        $user = $this->userModel->getBenDetailsById($requests->B_Id);

        $data = [
            'requests' => $requests,
            'user' => $user
        ];

        if ($data['requests'] != null) {
            $this->view('profilebens/index', $data);
        } else {
            redirect('schedulereq_dons/index');
        }
    }
}