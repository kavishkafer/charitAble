<?php
use helpers\Email;
class Reset_passwords extends Controller{
    public function __construct(){
       
        // $this->requestModel = $this->model('Request_ben');
        $this->userModel = $this->model('User');
        $this->resetModel = $this->model('Reset_password');
    }
   
public function Reset_password(){
    if(isset($_POST["reset_request_submit"])){
        $data=['email' => trim($_POST['email']),
                'email_err' => ''
    ];

        // Validate Email
        if(empty($data['email'])){
            $data['email_err'] = 'Please enter email';
        }

        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);
        $url = URLROOT . "/reset_passwords/create_new_password?selector=" . $selector . "&validator=" . bin2hex($token);
        $expires = date("U") + 1800;
        $userEmail = $_POST["email"];
       
        $this->resetModel->deleteToken($userEmail);
        $this->resetModel->insertToken($selector, $token, $expires, $userEmail);
        // $to = $userEmail;
        // $subject = 'Reset your password for charity';
        // $message = '<p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email</p>';
        // $message .= '<p>Here is your password reset link: </br>';
        // $message .= '<a href="' . $url . '">' . $url . '</a></p>';
        // $headers = "From: CharitAble <kavishkafernando64@gmail.com>\r\n";
        // $headers .= "Reply-To: kavishkafernando64@gmail.com\r\n";
        // $headers .= "Content-type: text/html\r\n";
        $email = new Email($userEmail);
        $email->sendResetEmail($userEmail, $url);

    
        $this->view('reset_passwords/reset_password', $data);
    }else{
        $data=['email' => '',
               'email_err' => '',

        ];
       
        $this->view('reset_passwords/reset_password', $data);
    }

}
public function create_new_password(){
    $selector = '';
    $validator = '';
    $pwd_err = '';
    if(isset($_POST ["reset_password_submit"])){
        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["pwd"];
        $passwordRepeat = $_POST["pwd-repeat"];
        if(empty($password) || empty($passwordRepeat)){
            redirect('reset_passwords/create_new_password?newpwd=empty');
            header("<?php echo URLROOT; ?>/reset_passwords/create_new_password?newpwd=empty");
            //$this->view('reset_passwords/create_new_password');
            exit();
        }else if($password != $passwordRepeat){
            redirect('reset_passwords/create_new_password?newpwd=pwdnotsame');
            header("<?php echo URLROOT; ?>/reset_passwords/create_new_password?newpwd=pwdnotsame");
            //$this->view('reset_passwords/create_new_password');
            exit();
        }
        $currentDate = date("U");
        echo $selector;
        $row = $this->resetModel->getToken($selector, $validator);
        var_dump($row);
        if (!$row || $row["pwdResetExpires"] < date("U")) {
            echo "You need to re-submit your reset request.";
            //$this->view('reset_passwords/token_expired');
            exit();
        }
        // Verify if the $selector value is correct
        elseif ($row["pwdResetSelector"] !== $selector) {
            echo "Invalid selector value.";
            exit();
        }
        elseif ($row) {
        //$this->resetModel->getToken($selector, $validator);
        //if(!$row = $this->resetModel->getToken($selector, $validator)){
            //echo "You need to re-submit your reset request.";
           // exit();
        //}else{
            //--if($row["expires"] >= $currentDate){
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["token"]);
                if($tokenCheck === false){
                    echo "You need to re-submit your reset request.";
                    exit();
                }elseif($tokenCheck === true){
                    $tokenEmail = $row["userEmail"];
                    $this->resetModel->updatePassword($password, $tokenEmail);
                    $this->resetModel->deleteToken($tokenEmail);
                    header("<?php echo URLROOT; ?>/reset_passwords/create_new_password?newpwd=passwordupdated");
                    $this->view('reset_passwords/create_new_password');
                exit();
                }
            }else{
                echo "You need to re-submit your reset request.";
            }
        }
    $data = [
        'selector' => $_GET['selector'] ?? $selector,
        'validator' => $_GET['validator'] ?? $validator,
        'pwd_err' => $_GET['newpwd'] ?? $pwd_err
    ];
    $this->view('reset_passwords/create_new_password', $data);
    }
}

    


