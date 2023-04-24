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
    <title>Login</title>
  </head>
  <body>
    <header>
      <div class="container flexme">
        <div class='logo'><a href="../view/feed.php"><img src=" /Public/images/WebImages/logo.png" alt=""></a></div>
      
        <nav>
          <ul class="flexme">           
            <?php
            if( empty($_SESSION['mail']) && empty($_SESSION['user_id']))
            {
              $loginLink = '/User/loginView';
              $registrationLink = '/User/registerView';
              $adminLink='/Admin/loginView';
          ?>
              <li><a href="<?php echo $loginLink; ?>">User Login</a></li>
              <li><a href="<?php echo $registrationLink; ?>">User SignUP</a></li>
              <li><a href="<?php echo $adminLink; ?>">Admin Login</a></li>
          <?php
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
    <form action="/user/adminLogin" method="post">
      <h2>Admin Login</h2>
      <div>
        <label for="email">Email</label>
        <input
          type="email"
          id="email"
          name="email"
        />
      </div>
      <div>
        <label for="password">Password</label>
        <input
          type="password"
          id="password"
          name="password"
        />
      </div>
      <div>
        <a href="../view/OTP.php">Forgot Password</a>
      </div>
      <input type="submit" value="Login">
      <div>New User <a href="../view/RegistrationPage.php">Join Now</a></div>
    </form>
  </body>
</html>
