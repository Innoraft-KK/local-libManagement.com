<?php
if(isset($_SESSION['user_id'])){
    header('Location: /post/feed');
 } 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Mynerve&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/css/login_reg.css">
    <title>Edit Post</title>
  </head>
  <body>
    <header>
      <div class="container flexme">
        <div class='logo'><a href="../view/feed.php"><img src="./WebImages/logo.png" alt=""></a></div>
        <nav>
          <ul class="flexme">
           
           
            <?php
            if( !empty($_SESSION['mail']) && !empty($_SESSION['user_id']))
            { 
              echo "<li><a href='../view/Profile.php?user_id=".$_SESSION['user_id']."'>My Profile</a></li>";
              echo "<li><a href='../view/CreatePost.php'><i class='fa-solid fa-pen-to-square'></i> </a></li>";
              echo "<li><a href='../controller/Logout.php'><i class='fa-solid fa-arrow-right-from-bracket'></i></a></li>";
            }
            else{
              echo "<li><a href='../view/Login.php'>Login</a></li>";
              echo "<li><a href='../view/RegistrationPage.php'>SignUP</a></li>";
            }
            ?>
            
          </ul>
        </nav>
      </div>
    </header>
    <main>
      <section class="container">
              <form action='/Post/edit?post_id=<?php echo $post['post_id']; ?>' method='post'>
                <div class='create-edit'>
                  <?php
                    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

                    if ($user_id == $post['user_id']) {
                      echo '<label for="Title">Title</label>
                            <input type="text" id="Title" value="'. $post['Title'] . '" name="Title"/>';

                      echo  '<label for="description">Description</label>
                            <textarea id="description" name="description" rows="5" cols="50" resize="both">' . $post['description'] . '</textarea>';
                    } else {
                      header('Location: /post/feed');
                    }
                  ?>
                </div>
                <input type="submit" value="Submit">
              </form>
            </div>
        </form>
      </section>
    </main>
  </body>
</html>
