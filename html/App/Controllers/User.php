<?php
namespace App\Controllers;

use App\Helpers\Sess;
use \Core\View;
use App\Models\UserDB ;

/**
 * User 
 * user class handles all the user routes and perform login,logout,update and register functions
 */
class User extends \Core\Controller
{
    /**
     * Displays the admin login page.
     * @return void
     */
    public function adminloginViewAction(){
        View::render('/User/AdminLogin.php'); 
    }

    /**
     * Performs the admin login action.
     * @return void
     */

    public function adminLoginAction()
   {
        $session =new Sess();
        if ($session->adminLoggedIn()) {
            header ('Location: /Post/feed');
            exit();
        }
        if ($_SERVER["REQUEST_METHOD"]  =="POST") {

            if(isset($_POST['email']) && isset($_POST['password']))
            {
                $user =new UserDB($_POST);
                $row = $user->adminLogin();
                if($row){
                    $_SESSION['mail'] = $_POST['email'];
                    $_SESSION["admin_id"] = $row['id'];
                  
                    header ('Location: /Post/feed');
                     exit();
                }
                else{
                    $_SESSION['status'] = 'Wrong Credential';
                    View::render('/User/AdminLogin.php'); 
                    exit(); 
                }
               
            }
        } else {
            View::render('/User/AdminLogin.php'); 
        }
   }

   /**
     * Displays the user login page.
     * @return void
     */

    public function loginViewAction(){
        View::render('/User/Login.php'); 
    }

     /**
     * Performs the user login action.
     * @return void
     */
    public function loginAction()
   {
        $session =new Sess();
        if ($session->isLoggedIn()) {
            header ('Location: /Post/feed');
            exit();
        }
        if ($_SERVER["REQUEST_METHOD"]  =="POST") {

            if(isset($_POST['email']) && isset($_POST['password']))
            {
                /* $this->UserDB($_POST); */
                $user =new UserDB($_POST);
                $row = $user->Login();
                if($row){
                    $_SESSION['mail'] = $_POST['email'];
                   $_SESSION['user_id'] = $row['user_id'];
                  
                    header ('Location: /Post/feed');
                     exit();
                }
                else{
                    $_SESSION['status'] = 'Wrong Credential';
                    View::render('/User/Login.php'); 
                    exit(); 
                }
               
            }
        } else {
            View::render('/User/Login.php'); 
        }
   }
    /**
   * Registers a new user with the given first name, last name, email, and password.
   * @param string $fname The first name of the user.
   * @param string $lname The last name of the user.
   * @param string $email The email of the user.
   * @param string $password The password of the user.
   * @return void
    */
    public function registerView(){
        View::render('/User/Register.php');
    }

    /**
     * Performs the user registration action.
     * @return void
     */
    public function register(){
        $session =new Sess();
        if ($session->isLoggedIn()) {
            header ('Location: /Post/feed');
            exit();
        }
        if ($_SERVER["REQUEST_METHOD"]  =="POST") {

            if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password'])){
                $user =new UserDB($_POST);
                $reg  = $user->register();
               
                if($reg){
                    View::render('/User/Login.php');
                }
                else{
                    $_SESSION['status'] = 'User Exist';
                    View::render('/User/Register.php'); 
                    exit(); 
                }
            }
        }
        else {
            header ('Location: /Post/feed');
        }
    }


    public function profileAction(){
        $user =new UserDB($_GET);
        $profile = $user->profile();
        if($profile) {
            View::render('/User/Profile.php',[
                'profile'  => $profile
            ]); 
        }
    }  

     /**
     * logout
     *logout user
     * @return void
     */
    public function logout()
    {
        $session =new Sess();
        $session->logOut();
        View::render('/User/Login.php'); 
        exit(); 
   }
    /**
     * editViewAction
     * Display edit user form
     *
     * @return void
     */
   public function editViewAction(){
        $profiles =new UserDB($_GET);
        $profile = $profiles->profile();
        
        if($profile) {
            View::render('/User/EditUser.php',[
                'profile'  => $profile
            ]); 
        }
        else{ 
            header('Location: /Post/feed');
        } 
    }

    /**
     * editAction
     * Edit user information
     *
     * @return void
     */
    public function editAction(){
        $user =new UserDB($_GET);
        $user = $_GET['user_id'];
        if($_SESSION['user_id'] == $user)
        {
            $profile = $user->editUser();
        }
}
}
