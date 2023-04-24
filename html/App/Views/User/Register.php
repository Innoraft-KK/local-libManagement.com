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
    <title>Register</title>
  </head>
  <body>
    <header>
      <div class="container flexme">
        <div class='logo'><a href="../view/feed.php"><img src=" /Public/images/WebImages/logo.png" alt=""></a></div>
        <nav>
          <ul class="flexme">
            <?php
            if( empty($_SESSION['mail']) && empty($_SESSION['user_id'])){
           /*   
              echo "<li><a href='../view/Profile.php?user_id=".$_SESSION['user_id']."'>My Profile</a></li>";
              echo "<li><a href='../view/CreatePost.php'><i class='fa-solid fa-pen-to-square'></i> </a></li>";
              echo "<li><a href='../controller/Logout.php'><i class='fa-solid fa-arrow-right-from-bracket'></i></a></li>";
            }
            else{ */
              $loginLink = '/User/loginView';
              $adminLink='/Admin/loginView';
          ?>
              <li><a href="<?php echo $loginLink; ?>">User Login</a></li>
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
  <section class="container">
    <form action="/user/register" method="post">
      <h2>User Register</h2>
      <div>
        <label for="fname">First Name</label>
        <input type="text"  id="fname"  name="fname" />
      </div>
      <div>
        <label for="lname">Last Name</label>
        <input  type="text"  id="lname"  name="lname" />
      </div>
      <div>
        <label for="email">Email</label>
        <input  type="email"  id="email"  name="email"/>
      </div>
      <div>
        <label for="password">Password</label>
        <input  type="password"  id="password"  name="password"/>
      </div>
      <div>
        <label for="re-password">Re-enter Password</label>
        <input  type="password"  id="re-password" />
      </div>
      <button>Sign Up</button>
      <div>Already on Pen dowow? <a href="../view/Login.php">Log In</a></div>
    </form>
  </section>
  <script src="./script.js"></script>
  </body>
</html>
