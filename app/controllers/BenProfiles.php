<?php
class BenProfiles extends Contoller
{
    public function __construct()
    {
        $this->benProfileModel = $this->model('BenProfile');
    }
    public function index()
    {
//        $ben = $this->benProfileModel->getOrigin();
//        $data = [
//            'ben' => $ben
//        ];
        $this->view('benProfiles/index');
    }
}