<?php
class dashboard_dons extends Controller{
    public function __construct(){
         /*if(!isLoggedIn()){
            redirect('users/login_dons');
        }
        $this->view('dashboard_dons/index', $data);*/

    }

    public function index(){

        /*if(isLoggedIn()){
            redirect('dashboard_dons/index');
        }*/

        $data = [
            'title' => ''
        ];

       $this->view('dashboard_dons/index', $data);
    }

}