<?php
class Users extends Controller{
    public function __construct(){
        $this->userModel = $this->model('User');
    }
    
    public function register(){
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            //Sanitize POST data

            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            //Process form
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => "",
                'email_err' => "",
                'password_err' => "",
                'confirm_password_err' => "",
            ];

            //Validate Email

            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }else{
                //check email  exists or not
                if(($this->userModel->findUserByEmail($data['email']))){
                    $data['email_err'] = 'Entered email already exists.';
                }
            }

            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password at least 6 characters';
            }

            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please enter confirm password';
            }else{
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Password do not match';
                }
            }

            //Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                //Validated    
                
                //Hash Password
                $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                // Register User

                if($this->userModel->register($data)){
                     session()->flash("register_success","Now you are registered. You can log in now.");
                    redirect('users/login');
                }else{
                    die("something went wrong");
                }
            }
            $this->view("users/register",$data);
        }else{
            //Init data
            $data = [
                'name' => "",
                'email' => "",
                'password' => "",
                'confirm_password' => "",
                'name_err' => "",
                'email_err' => "",
                'password_err' => "",
                'confirm_password_err' => "",
            ];
            $this->view("users/register",$data);
        }
    }
    public function login(){
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form
            //Sanitize POST data

            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            //Process form
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => "",
                'password_err' => "",
            ];

            //Validate Email

            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }

            if(empty($data['password'])){
                $data['password_err'] = 'Please enter password';
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password at least 6 characters';
            }

            //Check for user/email

            if($this->userModel->findUserByEmail($data['email'])){
                // User found

                //Check and set logged inn user

                $loggedInUser = $this->userModel->login($data['email'],$data['password']);

                if($loggedInUser){
                    // Create the session
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password-err'] = "Password incorrect";
                    $this->view("users/login",$data);
                }
            }else{
                // User not found
                $data['email_err'] = "No user found";
            }

            //Make sure errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])){
                //Validated    
                die("Success");            
            }
            $this->view("users/login",$data);
        }else{
            //Init data
            $data = [
                'email' => "",
                'password' => "",               
                'email_err' => "",
                'password_err' => "",
            ];
            $this->view("users/login",$data);
        }
    }

    public function logout(){
        auth()->logout();
        redirect('users/login');
    }

    public function createUserSession($user){
        auth()->createUserSession($user);
        redirect('pages/index');
    }
}
