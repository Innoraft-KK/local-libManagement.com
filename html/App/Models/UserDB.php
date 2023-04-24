<?php
namespace App\Models;

//session_start();
/**
* Class UserInfo
* Represents a user information class which has methods for registering, login, checking email, changing password,
* displaying user profile, and editing user details.
*/
class UserDB extends \Core\Model{
    private $db;
    public $fname,$lname,$password,$email,$bio,$proff,$conn,$user_id;

    function __construct($data=[]){
        foreach ($data as $key=>$value){
            if (!property_exists($this, $key)) {
                // handle deprecated property name
                continue;
            }
            $this->$key=$value;
        }
    }

    /**
    * Registers a new user with given details.
    * Inserts user details into database and redirects to Login page if successful,
    * otherwise displays 'User Exist' message on RegistrationPage.
    */
    function register(){
        if($this->userExist($this->email)){
            $db = self::getDB();
            $sql="INSERT INTO User (fname,lname,password,email) VALUES ('$this->fname','$this->lname','$this->password','$this->email')";
            $result = mysqli_query($db, $sql);
            return $result;
            }
        else{ 
            return false;
        }
    }

    /**
    * Login a user with given email and password.
    * Fetches user details from database and sets session variables.
    * Redirects to feed page if successful, otherwise displays 'Wrong Credential' message on Login page.
    */
    function login(){
        $db = self::getDB();
        $sql="SELECT email,password,id FROM customer WHERE email='$this->email' and password='$this->password'"; 
        $result = mysqli_query($db, $sql);
        $row = $result->fetch_assoc();
        if($row){
            return $row;
        }
        else{
            return false;
        } 
    }
    function adminLogin(){
        $db = self::getDB();
        $sql="SELECT email,password,id FROM lib_admin WHERE email='$this->email' and password='$this->password'"; 
        $result = mysqli_query($db, $sql);
        $row = $result->fetch_assoc();
        if($row){
            return $row;
        }
        else{
            return false;
        } 
    }
    

    /**

    * Checks if the given email exists in the database.
    * If the email exists, generates and sends an OTP to that email and redirects to ChangePassword page.
    * Otherwise, displays 'Wrong Email or email does not exist' message on OTP page.
    */
    function checkEmail(){
        
        $sql="SELECT * FROM User WHERE email='$this->email'"; 
        $result = $this->db->execute($sql);
        $row = $result->fetch_assoc();
        
        if($row['email']==$this->email){
            $gen_otp = random_int(100000, 999999);
            $_SESSION['OTP']=$gen_otp;
            $_SESSION['email']=$this->email;
            // $message='Your OTP for changing password is '.$gen_otp;
            // $subject='OTP for password change';
            // include './sendMail.php';
            // header('Location: ../view/ChangePassword.php');
        }
        else{
            $_SESSION['status']='Wrong Email or email does not exist';
            // header('Location: ../view/OTP.php');
        }
    }

    /**

    * Changes the password for the given email in the database.
    * If successful, clears session variables and redirects to Login page.
    * Otherwise, displays 'Unable to change password' message on ChangePassword page.
    */
    function changePassword(){
        $db = self::getDB();
        $sql="UPDATE User set password='$this->password' where email='$this->email'"; 
        $result = mysqli_query($db, $sql);
        if($result){
            unset($_SESSION['OTP'], $_SESSION['email']);
            // header('Location: ../view/Login.php');
        }
        else{
            $_SESSION['status']='Unable to change password';
            // header('Location: ../view/ChangePassword.php');
        }
    }
    /**
    * Function to get the profile details of a user from the User table
    * @return array Returns an array containing the user's profile details
    */
    function profile(){
        $db = self::getDB();
        $sql="SELECT * FROM User WHERE user_id='$this->user_id';"; 
        //$result = $this->db->execute($sql);
        $result = mysqli_query($db, $sql);
        return  $result->fetch_assoc();
    }
    /**
    * Function to edit the user's profile details in the User table
    */
  /*   function editUser(){
        
            $db = self::getDB();
            $sql="UPDATE User SET proff='$this->proff',bio='$this->bio' WHERE user_id='$user'";
            $result = mysqli_query($db, $sql);
            return $result;
          
    } */
    public function userExist($email) 
    {   $db = self::getDB();
        $sql = "SELECT email from User where email = '$email'";
        $result = mysqli_query($db, $sql);
        if ($result){
            return true;
        }
        return false;
    }
}
?>
