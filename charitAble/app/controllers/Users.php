<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
      $this->settingModel = $this->model('Setting');
    }

    // public function register(){
    //   // Check for POST
    //   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     // Process form
  
    //     // Sanitize POST data
    //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //     // Init data
    //     $data =[
    //       'name' => trim($_POST['name']),
    //       'email' => trim($_POST['email']),
    //       'password' => trim($_POST['password']),
    //       'confirm_password' => trim($_POST['confirm_password']),
    //       'name_err' => '',
    //       'email_err' => '',
    //       'password_err' => '',
    //       'confirm_password_err' => ''
    //     ];

    //     // Validate Email
    //     if(empty($data['email'])){
    //       $data['email_err'] = 'Please enter email';
    //     } else {
    //       // Check email
    //       if($this->userModel->findUserByEmail($data['email'])){
    //         $data['email_err'] = 'Email is already taken';
    //       }
    //     }

    //     // Validate Name
    //     if(empty($data['name'])){
    //       $data['name_err'] = 'Please enter name';
    //     }

    //     // Validate Password
    //     if(empty($data['password'])){
    //       $data['password_err'] = 'Please enter password';
    //     } elseif(strlen($data['password']) < 6){
    //       $data['password_err'] = 'Password must be at least 6 characters';
    //     }

    //     // Validate Confirm Password
    //     if(empty($data['confirm_password'])){
    //       $data['confirm_password_err'] = 'Please enter confirm password';
    //     } else {
    //       if($data['password'] != $data['confirm_password']){
    //         $data['confirm_password_err'] = 'Password do not match';
    //       }
    //     }

    //     // Make sure errors are empty
    //     if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
    //       // Validated
          
    //       // Hash Password
    //       $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    //       // Register User
    //       if($this->userModel->register($data)){
    //         redirect('users/login');
    //       } else {
    //         die('Something went wrong');
    //       }

    //     } else {
    //       // Load view with errors
    //       $this->view('users/register', $data);
    //     }

    //   } else {
    //     // Init data
    //     $data =[
    //       'name' => '',
    //       'email' => '',
    //       'password' => '',
    //       'confirm_password' => '',
    //       'name_err' => '',
    //       'email_err' => '',
    //       'password_err' => '',
    //       'confirm_password_err' => ''
    //     ];

    //     // Load view
    //     $this->view('users/register', $data);
    //   }
    // }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'admin_email' => trim($_POST['admin_email']),
          'admin_password' => trim($_POST['admin_password']),
          'admin_email_err' => '',
          'admin_password_err' => ''      
        ];

        // Validate Email
        if(empty($data['admin_email'])){
          $data['admin_email_err'] = 'Please enter email';
        }

        // Validate Password
        if(empty($data['admin_password'])){
          $data['admin_password_err'] = 'Please enter password';
        }

        // Check for user/email
        if($this->userModel->findUserByEmail($data['admin_email'])){
          // User found
        } else {
          // User not found
          $data['admin_email_err'] = 'No user found';
        }

        // Make sure errors are empty
         if(empty($data['admin_email_err']) && empty($data['admin_password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['admin_email'], $data['admin_password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
            
            $this->view('dashboard/dash_view', $data);

          } else {
            $data['admin_password_err'] = 'Password incorrect';

            $this->view('users/login', $data);
            }

          }  else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'admin_email' => '',
          'admin_password' => '',
          'admin_email_err' => '',
          'admin_password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }

    public function createUserSession($admin){
      $_SESSION['admin_id'] = $admin->admin_id;
      $_SESSION['admin_name'] = $admin->admin_name;
      $_SESSION['admin_email'] = $admin->admin_email;
      $_SESSION['admin_phone'] = $admin->admin_phone;
      $_SESSION['admin_password'] = $admin->admin_passd;
      $_SESSION['admin_nic'] = $admin->admin_nic;
      $_SESSION['admin_date_assigned'] = $admin->admin_date_assigned;
      redirect('dashboard/dash_view');
    }

    public function logout(){
      unset($_SESSION['admin_id']);
      unset($_SESSION['admin_email']);
      unset($_SESSION['admin_name']);
      session_destroy();
      redirect('users/login');
    }

    public function isLoggedIn(){
      if(isset($_SESSION['admin_id'])){
        return true;
      } else {
        return false;
      }
    }
  }