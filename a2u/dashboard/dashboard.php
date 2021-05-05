<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: /a2u/dashboard/dashboard.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: /a2u/");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/a2u/css/dashboard.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
    />
    <title>Dashboard</title>
  </head>
  <body>
    <div class="sidebar">
      <div class="sidebar-brand">
        <h2><i class="las la-user-circle"></i>Welcome</h2>
      </div>
      <div class="sidebar-menu">
        <ul>
          <li>
            <a class="active" href=""><i class="las la-chart-line"></i> Dashboard</a>
          </li>
          <li>
            <a href="dashboard.php"><i class="las la-file-contract"></i> Aggrements</a>
          </li>
          <li>
            <a href=""><i class="las la-user-friends"></i> Tennats</a>
          </li>
          <li>
            <a href=""><i class="las la-comment-dots"></i> Messages</a>
          </li>
           <li>
            <a href=""><i class="las la-comment-dots"></i> Notifications</a>
          </li>
          <li>
            <a href="account.php"><i class="las la-user"></i> Account</a>
          </li>
          <li>
            <a href="/a2u/index.php?logout='1'"><i class="las la-sign-out-alt"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-content">
      <header>
        <h2>
          <label for="">
            <i class="las la-bars"></i>
          </label>
          Dashboard
        </h2>
        <div class="search">
          <i class="las la-search"></i>
          <input type="search" placeholder="Search Here" />
        </div>
        <div class="user-wrapper">
          <img src="/a2u/images/propic.jpeg" alt="" width="40px" height="40px" />
          <div class="user-name">
            <h4><?php echo $_SESSION['username']; ?></h4>
            <small>Admin</small>
          </div>
        </div>
      </header>

      <main>
        <div class="cards">
          <div class="card-single">
            <div class="card-info">
              <h1>54</h1>
              <span>Tennants</span>
            </div>
            <div class="card-icons">
              <i class="las la-user-friends"></i>
            </div>
          </div>
          <div class="card-single">
            <div class="card-info">
              <h1>54</h1>
              <span>Tennants</span>
            </div>
            <div class="card-icons">
              <i class="las la-user-friends"></i>
            </div>
          </div>
          <div class="card-single">
            <div class="card-info">
              <h1>54</h1>
              <span>Tennants</span>
            </div>
            <div class="card-icons">
              <i class="las la-user-friends"></i>
            </div>
          </div>
          <div class="card-single">
            <div class="card-info">
              <h1>5</h1>
              <span>Tennants</span>
            </div>
            <div class="card-icons">
              <i class="las la-user-friends"></i>
            </div>
          </div>
        </div>
      </main>
    </div>
  </body>
</html>
