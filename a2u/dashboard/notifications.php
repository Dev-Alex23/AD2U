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
            <a href="agreement.php"><i class="las la-file-contract"></i> Agreements</a>
          </li>
          <li>
            <a  href="tenants2.php"><i class="las la-user-friends"></i> Tennats</a>
          </li>
          <li>
            <a href=""><i class="las la-comment-dots"></i> Messages</a>
          </li>
          <li>
            <a class="active" href="notifications.php"><i class="las la-comment-dots"></i> Notifications</a>
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
            
            <small>Admin</small>
          </div>
        </div>
      </header>

      <main>
	  
	  
     <title> Agreement for tenant</title>




</head>	
<body>
  
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
  
 
  $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "ad2u";

  $conn = mysqli_connect($host,$user,$pass, $db);
  if(!$conn)
  {
    die("Connection failed: " . mysqli_connect_error());
  }
$sql_display_notifications = "SELECT NotificationMsg, Notificationdate FROM notifications ORDER BY Notificationdate DESC";
$rs2 = mysqli_query($conn, $sql_display_notifications);
//get row
//$fetchRow = mysqli_fetch_assoc($rs2);
if (mysqli_num_rows($rs2)>0){
   echo "Number of notifications: ". mysqli_num_rows($rs2). "<br>";
   
//$NotificationMsg=$fetchRow['NotificationMsg'];
   while($row = mysqli_fetch_assoc($rs2)){
      
      echo "<br><h3><p style='color: red'>Notification:</p></h3>".$row["NotificationMsg"]. "<br> sent on ". $row["Notificationdate"]."<br><br> <a href='viewrequest.php'>More details</a> <br>";
      
   }
}
mysqli_close($conn);
?>   