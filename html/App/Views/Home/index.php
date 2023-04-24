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
    <title>Feed</title>
  </head>
  <body>
    <header>
      <div class="container flexme">
      <div class='logo'><a href="../view/feed.php"><img src=" /image/WebImages/logo.png" alt=""></a></div>
        <nav>
          <ul class="flexme">
          <?php
              if (!empty($_SESSION['mail']) || !empty($_SESSION['user_id']) || !empty($_SESSION['admin_id'])) {
                  $profileLink = '';
                  $createPostLink = '';
                  $logoutLink = '/User/logout';

                  if (isset($_SESSION['user_id'])) {
                      $profileLink = '/User/profile?user_id=' . $_SESSION['user_id'];
                  ?>
                      <li><a href="<?php echo $profileLink; ?>">My Profile</a></li>
                  <?php
                  }

                  if(isset($_SESSION['admin_id'])){
                      $createPostLink = '/Post/createView'; 
                  ?>
                      <li><a href="<?php echo $createPostLink; ?>"><i class='fa-solid fa-pen-to-square'></i></a></li>
                  <?php
                  }
              ?>
                  <li><a href="<?php echo $logoutLink; ?>"><i class='fa-solid fa-arrow-right-from-bracket'></i></a></li>
              <?php
              } else {
                  $loginLink = '/User/loginView';
                  $registrationLink = '/User/registerView';
                  $adminLink='/User/adminLoginView';
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
    <main>
      <section class="container">
      <div class="book-grid">
        <?php
        foreach($post as $posts){ 
        ?>
        <div class="book-card">
          <a href="index.html">
          <img src="<?php echo $posts['image'];?>" alt="<?php echo $posts['title'];?>">
          <div class="book-info">
            <h2><?php echo $posts['title'];?></h2>
            <p><?php echo $posts['description'];?></p>
            <p>Author: <?php echo $posts['author'];?></p>
            <p>Cost: <?php echo $posts['cost'];?></p>
          </div>
          </a>
        </div>
           <?php  } ?>
        </div>
      </section>
    </main>
    <footer >
      <div class='container'>
        <a href="about.html">About Us</a>
        <a href="contact.html">Contact Us</a>
      </div>
      <br><br>
      <p>© 2023 Pen Dowow Website. All rights reserved.</p>
    </footer>
  </body>
</html>