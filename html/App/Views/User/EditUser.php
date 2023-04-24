<?php
if(!$_SESSION){
    header('Location: ../view/Profile.php?user_id='.$_GET['user_id']);
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
    <title>Edit User</title>
  </head>
  <body>
    <header>
      <div class="container flexme">
        <div class='logo'><a href="../view/feed.php"><img src="./WebImages/logo.png" alt=""></a></div>
        <nav>
          <ul class="flexme">
            <?php
            $user_id=$_SESSION['user_id'];
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
      <!-- <section class="container">
        <?php  
            // echo "<form action='../controller/EditUser.php?user_id=".
            // $profile['user_id']."' method='post' enctype='multipart/form-data'>
            //     <div class='create-edit'>";
            //     if($_SESSION['user_id'] === $profile['user_id'])
            //     {
            //       var_dump($profile);
            //         echo  "<label for='proff'>Proffession</label>
            //         <input  type='text'  id='proff' value='".$profile['proff']."'  name='proff'/>
            //         <label for='bio'>Bio</label>
            //         <textarea id='bio' name='bio' rows='5' cols='50' resize='both'>".$profile['bio']."</textarea>";
            //         //echo "<div><input type='file' name='image' accept='.png,.gif,.jpeg'></div>";
            //     }
            //     else{
            //       header('Location: ../view/feed.php');
            //     }
                ?>
            </div>
            <input type="submit" value="Submit">
        </form>
      </section> -->
      <section class="container">
        <form action="../controller/EditUser.php?user_id=<?php echo $profile['user_id']; ?>" method="post" enctype="multipart/form-data">
          <div class="create-edit">
            <?php if($_SESSION['user_id'] === $profile['user_id']): ?>
              <label for="proff">Proffession</label>
              <input type="text" id="proff" value="<?php echo $profile['proff']; ?>" name="proff"/>
              <label for="bio">Bio</label>
              <textarea id="bio" name="bio" rows="5" cols="50" resize="both"><?php echo $profile['bio']; ?></textarea>
              <!-- <div><input type="file" name="image" accept=".png,.gif,.jpeg"></div> -->
            <?php else: ?>
              <?php header('Location: ../view/feed.php'); ?>
            <?php endif; ?>
          </div>
          <input type="submit" value="Submit">
        </form>
      </section>
    </main>
  </body>
</html>
