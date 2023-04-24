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
    <link rel="stylesheet" href="/css/login_reg.css" />
    <link rel="stylesheet" href="/css/profile.css" />
    <title>Profile</title>
  </head>
  <body>
    <header>
      <div class="container flexme">
        <div class='logo'><a href="../view/feed.php"><img src="/image/WebImages/logo.png" alt=""></a></div>
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
      <section class='container'>
        <div class='user-intro'>
          
          <h2><?php echo" ". $profile['fname'] . " " . $profile['lname'] ;?></h2>
            <div class='flexme proff'>
              <h3><?php echo " ". $profile['proff'] ." ";?></h3>
            </div>
          </div>
          <div class='user-desc flexme'>
            <div class='user-img'>
              <img src='/image/WebImages/user_img.png' alt='' />
            </div>
            <div class='user-info'>
              <div>
                <h4> About Me  &nbsp; &nbsp;
              <?php 
              if(isset($_SESSION['user_id'])){
             if($_SESSION['user_id'] == $_GET['user_id']){ 
              ?>
                <a href='../view/EditUser.php?user_id=
                <?php echo $_GET['user_id']; ?>'><i class='fa-solid fa-pen-to-square'></i></a>
              <?php
             }}
              ?>
                </h4>
              </div>
              <p><?php echo  $profile['bio'] ;?></p>
                <br>
              <p>
                <b>Email: </b><?php echo  $profile['email'] ;?>
              </p>
            </div>
          </div>
          </div>
        </div>
      </section>
      <section class='container'>
        <div>
        <?php
        /*
        foreach($posts as $post){ 
               echo "<div class='feed'>
               <h4>
                 <a href='../view/ViewPost.php?post_id=" . $post['post_id'] . "'>" . $post['Title'] . "</a>
               </h4>
               <div class='flexme'><span>By " . $post['fname'] . " " . $post['lname'] . " on " . $post['post_date'] . "</span></div>
               <p>" . $post['description'] . "</p>
           </div>"; 
        }  */
        ?>
        </div>
      </section>
    </main>
  </body>
</html>
