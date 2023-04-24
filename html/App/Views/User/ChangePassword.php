<?php
session_start();
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
    <link rel="stylesheet" href="profile.css" />
    <link rel="stylesheet" href="login_reg.css">
    <title>Change Password</title>
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
    <?php
    if(isset($_SESSION['status'])){
      echo
      "<div class='alert'>
      <span class='closebtn' onclick=";
      echo "this.parentElement.style.display='none';";
      echo">&times;</span> ";
      echo "<strong>";
      echo  $_SESSION['status'];
      echo "</strong>
      </div>";
      unset($_SESSION['status']);
    }
    ?>
    <section class="container ">
        <form action="../controller/ChangePassword.php" method='post'>
            <h3>New Password</h3>
            <div><<p>OTP is sent to your email please check and don't close tab</p>></div>
            <div>
                <label for="email">Email</label>
                <input type="email" id='email' name='email'>
            </div>
            <div>
                <label for="OTP">OTP</label>
                <input name='OTP' type="text" pattern="[0-9]*" maxlength="6" placeholder="Enter OTP" required>
            </div>
            <div>
              <label for="password">Password</label>
              <input  type="password"  id="password"  name="password"/>
            </div>
            <div>
              <label for="re-password">Re-enter Password</label>
              <input  type="password"  id="re-password" />
            </div>
            <input type="submit" value="Change Password">
        </form>
    </section>
    <script src="./script.js"></script>
  </body>
</html>
