<?php 
    class Dashboard extends Controller {
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }
        }

        public function dash_view(){
            $this->view('dashboard/dash_view');
        }
    }