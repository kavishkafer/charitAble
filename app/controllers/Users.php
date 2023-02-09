<?php 
use helpers\email;

class Users extends Controller
{   public function __construct(){
    $this->userModel = $this->model('User');
    $this->Verify_model = $this->model('Verify_model');
    //$this->settingModel = $this->model('Setting');
  }

    public function index(){

    }



 
    

    public function signup_ben(){
        // Check for POST
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form

            //sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $otp_code = rand(100000,999999);

            $role = 1;

            
         
            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),  
                'telephone_number' => trim($_POST['telephone_number']),
                'address' => trim($_POST['address']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'user_role'=>$role,
                'status' => false,
                'otp'=>$otp_code,
                'latitude' => trim($_POST['latitude']),
                'longitude' => trim($_POST['longitude']),
                'name_err' => '',
                'email_err' => '',
                'telephone_number_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            //Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }
            //Validate Name
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }
            //Validate Telephone Number
            if(empty($data['telephone_number'])){
                $data['telephone_number_err'] = 'Please enter telephone number';
            }
            //Validate Address
            if(empty($data['address'])){
                $data['address_err'] = 'Please enter address';
            }
            //Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            } elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 characters';
            }
            //Validate Confirm Password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }
            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['telephone number_err']) && empty($data['address_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                // Validated
                //Hash
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                //Register User
                

                if($this->userModel->regcom($data) ){

                    flash('register_success', 'You are registered and can log in');
                    $x=$this->userModel->getBenUserId($data['email']);
                    $this->userModel->register($data,$x);
                    $email = new Email($data['email']);
                    $email->sendVerificationEmail($data['email'], $otp_code);
                    

                    redirect('Users/verify');
                } else {
                    die('Something went wrong');
                }

                
            } else {
                // Load view with errors
                $this->view('users/signup_ben', $data);
            }
            

            // Load view
            $this->view('users/signup_ben', $data);
        }
        else{
            // Init data
            $data = [
                'name' => '',
                'email' => '',  
                'telephone_number' => '',
                'address' => '',
                'password' => '',
                'status' => '',
                'otp'=>'',

                'role'=>'',
                'latitude' => '',
                'longitude' => '',

                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'telephone_number_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            // Load view
            $this->view('users/signup_ben', $data);
        }
    }


    public function login(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
            // Init data
            $data =[
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),

                'email_err' => '',
                'password_err' =>''    
              ];

              

               // Check for user/email
               if($this->userModel->findUserByEmail($data['email'])){
                $user_role=$this->userModel->findUserRoleByEmail($data['email']);

                // User found
              } else {
                // User not found
                $data['email_err'] = 'No user found';
              }
              // Validate Email
              if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
              }
      
              // Validate Password
              if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
              }
              
              // Make sure errors are empty
              if(empty($data['email_err']) && empty($data['password_err'])){
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if($loggedInUser){

                  
                  // Create Session
                  if($user_role==1){
                    $this->createBenSession($loggedInUser);
                  }
                  else if($user_role==2){
                    $this->createDonSession($loggedInUser);
                  }
                  else if($user_role==3){
                    $this->createEhSession($loggedInUser);
                  }
                  else if($user_role==4){
                    $this->createAdminSession($loggedInUser);
                  }
                  else{
                    
                    die('Something went wrong');
                  }
                } 
                
                
                } else {
                  $data['password_err'] = 'Password incorrect';
                  echo "Password incorrect";
      
                  $this->view('users/login', $data);
                }
              } 
      
      
            else {
              // Init data
              $data =[    
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',        
              ];
      
              // Load vie
              $this->view('users/login', $data);
            }
          }
          
            public function createBenSession($user){
                $_SESSION['user_id'] = $user->User_Id;
                $_SESSION['user_email'] = $user->User_Email;
                $_SESSION['user_role'] = $user->User_Role;
                redirect('request_bens');
              }


              public function createAdminSession($user){
                $_SESSION['user_id'] = $user->User_Id;
                $_SESSION['user_email'] = $user->User_Email;
                $_SESSION['user_role'] = $user->User_Role;
                $this->userModel->getAdminDetails($_SESSION['user_id']);
                $_SESSION['user_name'] = $user->User_Name;
                redirect('settings/add_newadmin');
              }


              public function createDonSession($user){
                $_SESSION['user_id'] = $user->User_Id;
                $_SESSION['user_email'] = $user->User_Email;
                $_SESSION['user_role'] = $user->User_Role;
                redirect('pages/index');
              }

              public function createEhSession($user){
                $_SESSION['user_id'] = $user->User_Id;
                $_SESSION['user_email'] = $user->User_Email;
                $_SESSION['user_role'] = $user->User_Role;
                redirect('pages/index');
              }



              public function logout(){
                unset($_SESSION['user_id']);
                unset($_SESSION['user_email']);
                unset($_SESSION['user_name']);
                session_destroy();
                redirect('users/login');
              }
              
              public function isLoggedIn(){
                if(isset($_SESSION['user_id'])){
                  return true;
                } else {
                  return false;
                }
              }

              public function verify(){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $data = [
                        'otp'=>trim($_POST['otp']),
                        'error'=>'',
                        'status'=> ''
                    ];
        
                    $verified = $this->Verify_model->verifyOTP($data['otp']);
        
                    if($verified){
                        if($this->Verify_model->verify($verified->B_Id)){

                          
                            // set verification successful flash message
        //                    setFlash("verify","Your account has been verified",Flash::FLASH_SUCCESS);
                            // redirect to the login
                            redirect('users/login');

                        }
                        else{
                            // set verification failed flash message
        //                    Flash::setFlash("verify","Account verification failed!",Flash::FLASH_DANGER);
                            // redirect to the signup 
                            redirect('users/signup_ben');
                        }
                    }
                    else{
                    
                        $data['error'] = "Invalid OTP";
                    }
                }
                else{
                    $data = [
                        'otp'=>'',
                        'error'=>'',
                        'status'=>''
                    ];
                }
                $this->view('users/signup_verification', $data);
            }


 
//Donor

public function signup_dons(){
  // Check for POST
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Process form

      //sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $user_role = 2;
   
      // Init data
      $data = [
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),  
          'tel_no' => trim($_POST['tel_no']),
          'address' => trim($_POST['address']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'user_role' => $user_role,
          'name_err' => '',
          'email_err' => '',
          'tel_no_err' => '',
          'address_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
      ];
      //Validate Email
      if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
      }else{
        //check email
        if($this->userModel->findUserByEmail_don($data['email'])){
            $data['email_err'] = 'Email is already taken';  
        }
    }

      //Validate Name
      if(empty($data['name'])){
          $data['name_err'] = 'Please enter name';
      }
      //Validate Telephone Number
      if(empty($data['tel_no'])){
          $data['tel_no_err'] = 'Please enter telephone number';
      }
      //Validate Address
      if(empty($data['address'])){
          $data['address_err'] = 'Please enter address';
      }
      //Validate Password
      if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
      } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
      }
      //Validate Confirm Password
      if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password';
      } else {
          if($data['password'] != $data['confirm_password']){
              $data['confirm_password_err'] = 'Passwords do not match';
          }
      }
      // Make sure errors are empty
      if(empty($data['email_err']) && empty($data['name_err']) && empty($data['tel_no_err']) && empty($data['address_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // Validated
          //Hash
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
          //Register User
          if($this->userModel->regcom($data)){
            $x=$this->userModel->getDonUserId($data['email']);
            $this->userModel->signup_don($data, $x);
              flash('register_success', 'You are registered and can log in');
              redirect('users/login');
          } else {
              die('Something went wrong');
          }

          
      } else {
          // Load view with errors
          $this->view('users/signup_dons', $data);
      }
      

      // Load view
      $this->view('users/signup_dons', $data);
  }
  else{
      // Init data
      $data = [
          'name' => '',
          'email' => '',  
          'tel_no' => '',
          'address' => '',
          'password' => '',
          'confirm_password' => '',
          'user_role' => '',
          'name_err' => '',
          'email_err' => '',
          'tel_no_err' => '',
          'address_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
      ];
      // Load view
      $this->view('users/signup_dons', $data);
  }
}

public function signup_eh(){
  // Check for POST
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Process form

      //sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $user_role = 3;
   
      // Init data
      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'address' => trim($_POST['address']),
        'tel_no' => trim($_POST['tel_no']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'user_role' => $user_role,
        'name_err' => '',
        'email_err' => '',
        'address_err' => '',
        'tel_no_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];
      //Validate Email
      if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
      }else{
        //check email
        if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';  
        }
    }

      //Validate Name
      if(empty($data['name'])){
          $data['name_err'] = 'Please enter name';
      }
      //Validate Telephone Number
      if(empty($data['tel_no'])){
          $data['tel_no_err'] = 'Please enter telephone number';
      }
      //Validate Address
      if(empty($data['address'])){
          $data['address_err'] = 'Please enter address';
      }
      //Validate Password
      if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
      } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
      }
      //Validate Confirm Password
      if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password';
      } else {
          if($data['password'] != $data['confirm_password']){
              $data['confirm_password_err'] = 'Passwords do not match';
          }
      }
      // Make sure errors are empty
      if(empty($data['email_err']) && empty($data['name_err']) && empty($data['tel_no_err']) && empty($data['address_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // Validatede
        
          //Hash
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
          //Register User
          if($this->userModel->regcom($data)){
            $x=$this->userModel->getEhUserId($data['email']);
            $this->userModel->signup_eh($data, $x);
              flash('register_success', 'You are registered and can log in');
              redirect('users/login');
          } else {
              die('Something went wrong');
          }

          
      } else {
          // Load view with errors
          $this->view('users/signup_eh', $data);
      }
      

      // Load view
      $this->view('users/signup_eh', $data);
  }
  else{
      // Init data
      $data = [
        'name' => '',
        'email' => '',
                  'address' => '',
                  'tel_no' => '',
                  'password' => '',
                  'confirm_password' => '',  
                  'name_err' => '',
                  'email_err' => '',
                  'tel_no_err' => '',
                  'address_err' => '',
                  'password_err' => '',
                  'confirm_password_err' => ''
      ];
      // Load view
      $this->view('users/signup_eh', $data);
  }
}

 
      public function logout_don(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login_dons/');
      }
      
      /*public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
          return true;
        } else {
          return false;
        }
      }*/


          }
        
    
