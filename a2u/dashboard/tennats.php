<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
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
            <a href="dashboard.php"><i class="las la-chart-line"></i> Dashboard</a>
          </li>
          <li>
            <a href="agreements.php"><i class="las la-file-contract"></i> Aggrements</a>
          </li>
          <li>
            <a class="active" href="tennants.php"><i class="las la-user-friends"></i> Tennats</a>
          </li>
          <li>
            <a href="messages.php"><i class="las la-comment-dots"></i> Messages</a>
          </li>
           <li>
            <a href="notifications.php"><i class="las la-comment-dots"></i> Notifications</a>
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

      <div class="tennant-details">
        <div class="tennant-header">
          <h2>Tennats</h2>
          <a href="">View All</a>
        </div>
        <table>
          <thead>
            <tr>
              <td>Name</td>
              <td>Address</td>
              <td>Payment</td>
              <td>Status</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> Erfan</td>
              <td> Mclaren House</td>
              <td> £700</td>
              <td><span class="status-paid">Paid</span></td>
            </tr>
             <tr>
              <td> Nickolay</td>
              <td> Mclaren House</td>
              <td> £700</td>
              <td><span class="status-pending">Pending</span></td>
            </tr>
            <tr>
              <td> Angela</td>
              <td> Mclaren House</td>
              <td> £700</td>
              <td><span class="status-paid">Paid</span></td>
            </tr>
          </tbody>
        </table>
      </div>

      </main>
    </div>
  </body>
</html>
