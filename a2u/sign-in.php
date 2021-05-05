<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="/a2u/css/form.css" />
    <title>Sign Up</title>
  </head>
  <body>
    <header>
      <div class="logo"><a href="">Logo</a></div>
      <div class="menu">
        <ul>
          <li><a href="/a2u/">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">FAQ</a></li>
          <li class="ab"><a href="./sign-up.php">Sign Up</a></li>
        </ul>
      </div>
    </header>

    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
  
            <!-- Sign In form-->
          <form action="sign-in.php" method="POST" class="sign-in-form">
            <h2 class="title">Sign In</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input  type="text" placeholder="Username" name="username">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input  type="password" placeholder="Password" name="password">
            </div>
            <input type="submit" value="Login" class="btn solid" name="login_user">
  
            <p class="social-text">Or Sign In with Socials</p>
            <div class="social-media">
              <a href="#" aria-label="Facebook" class="social-icons">
                <i class="fab fa-facebook"></i>
              </a>
              <a href="#" aria-label="Instagram Link" class="social-icons">
                <i class="fab fa-instagram"></i> 
              </a>
              <a href="#" aria-label="Twitter"class="social-icons">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" aria-label="G-mail"class="social-icons">
                <i class="fab fa-google"></i>
              </a>
            </div>
  
            <div class="next-login">
              <a href="sign-up.php" class="social-text">New Here?</a>
            </div>
            </form>
  
          
        </div>
      </div>
    </div> 
   </body>
</html>
