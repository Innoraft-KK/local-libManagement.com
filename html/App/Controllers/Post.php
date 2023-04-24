<?php
/**

*   Post Controller Class
*    This class contains methods for handling posts, including creating, editing, and deleting posts.
*/

namespace App\Controllers;

use App\Helpers\Sess;
use \Core\View;
use App\Models\PostDB;

/**
 * Summary of Feed
 * to show questions in the feed
 */
class Post extends \Core\Controller
{
/**
* Displays a feed of all books
*
* @return void
*/
    public function feedAction(){
        $posts= new PostDB();
        $post=$posts->feed();
        if($post) {
            View::render('/Home/index.php',[
                'post' => $post
            ]); 
        }
    }
/**
 * Displays a single book
 * 
 * @return void
 */
    public function viewAction(){
        $posts= new PostDB($_GET);
        $post=$posts->viewPost();
        if($post) {
            View::render('/Post/Post.php',[
                'post' => $post
            ]); 
        }
    }
/**
 * Displays a view for creating a new post
 * 
 * @return void
 */
     public function createViewAction(){
        $session= new Sess();
        if ($session->adminLoggedIn()) {
        View::render('/Post/CreatePost.php');}
    }
/**
 * Creates a new post
 * 
 * @return void
 */
    public function createAction(){
         var_dump($_POST);
         var_dump($_FILES);
        $session= new Sess();
        if ($session->adminLoggedIn()) {
            if(isset($_POST['title']) and isset($_POST['description']) and isset($_POST['cost']) and isset($_POST['author'])){ 
                $user= new PostDB($_POST);
                 $row=$user->createPost();
                if($row){
                    header('Location: /Post/feed');
                }
            }
    }
}

/**
 * Displays a view for editing an existing post
 * 
 * @return void
 */
    public function editViewAction(){
        $posts= new PostDB($_GET);
        $post=$posts->viewPost();
        if($post) {
            View::render('/Post/EditPost.php',[
                'post' => $post
            ]); 
        }
        else{ 
            header('Location: /Post/feed');
          } 
    }

/**
 * Edits an existing post
 * 
 * @return void
 */
    public function editAction(){
        $res = false; // initialize $res variable
        if(isset($_POST['Title']) and isset($_POST['description']) and isset($_SESSION['user_id'])){
            $_POST['post_id']=$_GET['post_id'];
            $user= new PostDB($_POST); 
            var_dump($_POST);
            $res=$user->editPost();
            if($res){
                $str='Location: view?post_id='.$_POST['post_id'];
                header($str);
            }
        }
        else{
            header('Location: view/feed');
        }   
    }
    

/**
 * Deletes a post
 * 
 * @return void
 */
    public function deleteAction(){
        if(isset($_SESSION['user_id'])){
            $user= new PostDB($_GET);
            $result =$user->DeletePost();
             if($result){
               $_SESSION['status'] = 'Post Deleted Successfully';
               $str='Location: feed';
               header($str);            }
            else{
                $str='Location: feed';
                header($str);                }
            }
            else{
                $str='Location: feed';
                header($str);             }  
    }
}

?>