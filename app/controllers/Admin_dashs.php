<?php 
    class Admin_dashs extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }
            $this->adminDashModel = $this->model('Admin_dash');
        }

        public function dash_view(){
            // $this->view('admin/admin_dash');
            $ben_count = $this->adminDashModel->getBenCount();
            $don_count = $this->adminDashModel->getDonCount();
            $data = [
                'ben_count' => $ben_count,
                'don_count' => $don_count
            ];
            $this->view('admin/admin_dash',$data);
        }

    }