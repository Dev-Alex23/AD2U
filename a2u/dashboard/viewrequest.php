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
 
  $sql_display_request = "SELECT * FROM agreementchanges WHERE AgreementChangesID='92'";
  $rs3 = mysqli_query($conn, $sql_display_request);
  //if(mysqli_query($conn, $sql_display_request)){
  //  echo "Request has been sent successfully!";}
  $fetchRow = mysqli_fetch_assoc($rs3);

  $rent = $fetchRow ['RentAmountChange'];
  $msg = $fetchRow ['MsgRentChange'];


mysqli_close($conn);
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
	  
	  
     <title> Accept changes</title>




</head>	
<body>
<br><h3>The Tenant requested to change the rent amount to £<?php echo $fetchRow['RentAmountChange']?> and left the following message: </h3>
"<?php echo $fetchRow['MsgRentChange']?>"<br><br>

<form action="" method="post" >
    <input type="radio"  name="agree" value="yes">
    <label for="female">I AGREE to these changes</label><br>
    <input type="radio"  name="agree" value="no">
    <label for="female">I DISAGREE to these changes</label><br><br>
    <label ><b>Comment if nessesary:</b></label>
    <br>
     <textarea  name="comment" rows="5" cols="50" placeholder="Write your message with details here..."></textarea>
    
    <br><left><button type="submit" class="btn" name="agree" style="width: 110px;
    height: 35px;
    margin: 0 10px;
    background: linear-gradient(to right, #ADD8E6 , #7EB6FF);
    border-radius: 30px;
    border: 0;
    outline: none;
    color: #fff;
    cursor: pointer;">Submit</button></left>
</form></center>

</body>