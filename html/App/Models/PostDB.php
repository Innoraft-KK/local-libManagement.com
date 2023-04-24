<?php
namespace App\Models;

/**
 * Class blogPost
 */
class PostDB extends \Core\Model{
    public $id,$post_id,$title,$description,$author;
    private $db;
    /**
     * Constructor for the blogPost class
     *
     * @param array $data The data used to initialize the object
     */
    function __construct($data=[]){
        foreach ($data as $key=>$value){
            if (!property_exists($this, $key)) {
                // handle deprecated property name
                continue;
            }
            $this->$key=$value;
        }
       /*  $this->db =self::getDB(); */
    }

    function uploadBookImage($file) {
        // Set the target directory
        $targetDir = "/image/books/";
        
        // Create the target directory if it does not exist
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        
        // Get the file name and extension
        $fileName = basename($file["name"]);
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Generate a unique file name
        $uniqueFileName = uniqid() . '.' . $fileExt;
        
        // Set the new file path
        $newFilePath = $targetDir . $uniqueFileName;
        
        // Move the uploaded file to the new path
        if (move_uploaded_file($file["tmp_name"], $newFilePath)) {
            // Return the new file path
            return $newFilePath;
        } else {
            // Return null if the file could not be moved
            return null;
        }
    }
    
    
    
    function createPost(){
        $db = self::getDB();
        
        if (isset($_FILES["image"])) {
            $newImagePath = $this->uploadBookImage($_FILES["image"]);
            if ($newImagePath !== null) {
                $cost =(int) $_POST['cost'];
                $sql="INSERT INTO books (title, image, description, cost, author) VALUES ('$this->title', '$newImagePath', '$this->description', $cost, '$this->author');";
                echo $sql;
                $result = mysqli_query($db, $sql);
                return $result;
            } 
            else{
                return false;
            }
        }       
    }
     /**
     * Retrieves all posts from the database and returns them in an array
     *
     * @return array An array of all posts
     */

    function feed(){
        $db = self::getDB();
        $sql="SELECT * from books;";
        $result = mysqli_query($db, $sql);
        $arr=[];
        while($row = $result->fetch_assoc()){
        $arr[]=$row;
        }
        return $arr;
    }

     /**
     * Retrieves a specific post from the database and returns it as an associative array
     *
     * @return array The post specified by the post_id parameter
     */

    function viewPost(){
        if(isset($this->post_id)){
            $db = self::getDB();
            $sql="SELECT * from books where id='$this->id';";
            
            $result = mysqli_query($db, $sql);
            $row = $result->fetch_assoc();
            return $row;
        }
        else{
            return [];
        }
    }
    
    /**
     * Edits an existing post in the database
     */
    function editPost(){
        $db = self::getDB();
        //$post_id=$_GET['post_id'];
        //$sql="UPDATE Post SET Title='$this->Title',description='$this->description',post_date='$date' where post_id='$this->post_id'";
        //$result = mysqli_query($db, $sql);
        //return $result;
       //header('Location: ../view/ViewPost.php?post_id='.$post_id);
    }


    /**
     * Deletes a specific post from the database
     */
    
    function deletePost(){
        $db = self::getDB();
        $sql="SELECT user_id from books where post_id='$this->post_id'";
        $result = mysqli_query($db, $sql);
        $user= $result->fetch_assoc();
        if($_SESSION['user_id'] === $user['user_id']){
            $sql="DELETE from books WHERE post_id='$this->post_id'";
            $result = mysqli_query($db, $sql);
            return $result;
        }
    }
}
?>