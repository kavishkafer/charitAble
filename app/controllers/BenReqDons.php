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
        $getRequests = $this->benreqdonModel->getAllRequests();
        $data = [
            'requests' => $getRequests
        ];

        $this->view('benreqdons/index', $data);
    }


    public function acceptRequest($Id)
    {
        $this->benreqdonModel->getRequestDetails($Id);

        if ($this->benreqdonModel->acceptRequest($Id)) {
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
