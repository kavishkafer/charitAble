<?php
class Request_ben extends Controller{
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login_ben');
        }
    }
    public function index(){
        $data=[];
        $this->view('request_ben/index', $data);
    }
}