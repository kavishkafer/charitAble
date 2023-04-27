<?php
class dashboard_dons extends Controller{
    public function __construct(){
         /*if(!isLoggedIn()){
            redirect('users/login_dons');
        }
        $this->view('dashboard_dons/index', $data);*/
        $this->requestModel = $this->model('Schedulereq_don');
        $this->userModel = $this->model('User');

    }

    public function index(){

        $requests = $this->requestModel->getRequests();
        $row=$this->requestModel->getDonId($_SESSION['user_id']);
        $count=$this->requestModel->totalRequestsByDon($row->D_Id);
        $accept=$this->requestModel->acceptedRequestsDon($row->D_Id);
        $complete=$this->requestModel->completedRequestsDon($row->D_Id);
        $pending=$this->requestModel->pendingRequestsDon($row->D_Id);
        $data=[
            'requests' => $requests,
            'count' => $count,
            'accept' => $accept,
            'complete' => $complete,
            'pending' => $pending
        ];

       $this->view('dashboard_dons/index', $data);
    }

}