<?php
class BenReqDons extends Controller
{

    public function __construct()
    {
        $this->benreqdonModel = $this->model('BenReqDon');
        $this->userModel = $this->model('User');
        $this->requestModel = $this->model('Request_ben');

    }


    public function index()
    {
        $getRequest = $this->benreqdonModel->getAllRequest();
        $data = [
            'dat' => $getRequest
        ];
        $y = 44;
        // $y=$getRequest->B_Id;
        $getBenDetails = $this->benreqdonModel->getBenDetails($y);
        $data = [
            'request' => $getRequest,
            'ben' => $getBenDetails
        ];

        $this->view('benreqdons/index', $data);
    }


    public function acceptRequest($Id)
    {
        $c= $_SESSION['user_id'];
        $d =$this->benreqdonModel-> getDonId($c);
        $this->benreqdonModel->getRequestDetails($Id);
        if ($this->benreqdonModel->acceptRequest($Id, $d->D_Id)) {
            flash('request_message', 'Request Accepted');
            redirect('benreqdons/index');

        } else {
            die('Something went wrong');
        }
    }
    
    public function show($id = null)
    {

        $request = $this->requestModel->getRequestById($id);
        $user = $this->userModel->getUserById($request->B_Id);
        $data = [
            'requests' => $request,
            'user' => $user
        ];
          
        // redirect('benreqdons/show/' . $id , $data);
        $this->view('benreqdons/show', $data);

            //redirect('BenReqDons/show/'.$id, $data);
    }
}
