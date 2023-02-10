<?php 
    class Events extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }
            // $this->admin_dashModel = $this->model('Admin_dash');
        }

        public function list_of_events(){
            $this->view('admin/list_of_events');
        }
    }