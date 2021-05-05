<?php
// We need to use sessions, so you should always start sessions using the below code.
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
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'root';
$DATABASE_NAME = 'registration';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM users WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
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
    <div class="sidebar" onclick="toggleMenu()">
      <div class="sidebar-brand">
        <h2><i class="las la-home"></i>Welcome</h2>
      </div>
      <div class="sidebar-menu">
        <ul>
          <li>
            <a href="dashboard.php"><i class="las la-chart-line"></i> Dashboard</a>
          </li>
          <li>
            <a href=""><i class="las la-file-contract"></i> Aggrements</a>
          </li>
          <li>
            <a href="tennats.php"><i class="las la-user-friends"></i> Tennats</a>
          </li>
          <li>
            <a href=""><i class="las la-comment-dots"></i> Messages</a>
          </li>
          <li>
            <a class="active" href=""><i class="las la-user"></i> Account</a>
          </li>
          <li>
            <a href="index.php?logout='1'"><i class="las la-sign-out-alt"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-content">
      <header>
        <h2>
          <label onclick="toggleMenu()">
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

      <div class="profile">
      <h2>Account Details</h2>
      <div class="details">
      <h3>Profile details below</h3>
      <table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['username']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
				</table>

      </div>
      
      </div>
      </main>
    </div>

    <script>
    function toggleMenu () {

      let toggle = document.querySelector('.toggle');
      let sidebar = document.querySelector('.sidebar');
      
      // toggle.classList.toggle('active')
      sidebar.classList.toggle('active')
    }
    </script>
  </body>
</html>
