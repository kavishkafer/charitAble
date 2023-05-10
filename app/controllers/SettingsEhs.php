<?php

class SettingsEhs extends Controller
{
    public function __construct()
    {
        $this->settingsModel = $this->model('SettingsEh');
        $this->userModel = $this->model('User');
        $this->requestModel = $this->model('Request_eh');
    }

    public function index()
    {
        $c = $_SESSION['user_id'];
        $d = $this->requestModel->getEhId($c);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'user_id' => $c,
                'E_ID' => $d->E_ID,
                'E_Name' => $d->E_Name,
                //'D_Email' => $d->D_Email,
                'E_Tpno' => $d->E_Tpno,
                'E_Address' => $d->E_Address,
                //'D_Password' => $d->D_Password,
                //'latitude' => $d->latitude,
               // 'longitude' => $d->longitude,
                'E_Name_err' => '',
                //'D_Email_err' => '',
                'E_Tpno_err' => '',
                'E_Address_err' => ''
                //'D_Password_err' => '',

            ];
            $this->view('settingsehs/index', $data);
        } else {
//              $user = $this->requestModel->getBenId($_SESSION['user_id']);
            //check user is same
//              if ($user->User_id != $_SESSION['user_id']) {
//                  redirect('users/login');
//              }
            $data = [

                'user_id' => $c,
                'E_ID' => $d->E_ID,
                'E_Name' => trim($_POST['E_Name']),
//                  'B_Email' => trim($_POST['B_Email']),
                'E_Tpno' => trim($_POST['E_Tpno']),
                'E_Address' => trim($_POST['E_Address']),
//                  'B_Password' => trim($_GET['B_Password']),
                'E_Name_err' => '',
                //'D_Email_err' => '',
                'E_Tpno_err' => '',
                'E_Address_err' => ''
                //'D_Password_err' => '',
            ];
            if (empty($data['E_Name'])) {
                $data['E_Name_err'] = 'Please enter name';
            }
            /*if (empty($data['D_Email'])) {
                $data['D_Email_err'] = 'Please enter email';
            }*/
            if (empty($data['E_Tpno'])) {
                $data['E_Tpno_err'] = 'Please enter phone number';
            }
            if (empty($data['E_Address'])) {
                $data['E_Address_err'] = 'Please enter address';
            }
//              if (empty($data['B_Password'])) {
//                  $data['B_Password_err'] = 'Please enter password';
//              }

            if (empty($data['E_Name_err']) && empty($data['E_Tpno_err']) && empty($data['E_Address_err'])) {
                if ($this->settingsModel->updateProfile($data)) {
                    flash('profile_message', 'Profile Updated');
                    redirect('settingsehs/viewProfile');
                } else {
                    die('Something went wrong');
                }
            } else {

                $this->view('settingsehs/index', $data);

            }

        }


    }
    public function viewProfile(){
        $c = $_SESSION['user_id'];
        $d = $this->requestModel->getEhId($c);
        $data = [
            'user_id' => $c,
            'E_ID' => $d->E_ID,
            'E_Name' => $d->E_Name,
            //'D_Email' => $d->D_Email,
            'E_Tpno' => $d->E_Tpno,
            'E_Address' => $d->E_Address,
            //'D_Password' => $d->D_Password,
            //'latitude' => $d->latitude,
            //'longitude' => $d->longitude,
            'E_Name_err' => '',
            //'D_Email_err' => '',
            'E_Tpno_err' => '',
            'E_Address_err' => ''
            //'D_Password_err' => '',

        ];
        $this->view('settingsehs/view', $data);


    }
}
