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
  
$sql1 = "SELECT * FROM agreements WHERE email='a.s.bobrovskaja@gmail.com'";
$rs = mysqli_query($conn,$sql1);
//get row
$fetchRow = mysqli_fetch_assoc($rs);
$name=$fetchRow['tfirstName'];
$surname=$fetchRow['tlastName'];
$message = "Tenant $name $surname accepted all terms and conditions without requesting any changes!" ;

//$Email= 'a.s.bobrovkaja@gmail.com';
if(isset($_POST['agree']))
 { 
  $sql2 = "UPDATE agreements SET aStatus='1' WHERE email='a.s.bobrovskaja@gmail.com'";
  $rs1 = mysqli_query($conn, $sql2);
  $sql_notification="INSERT INTO notifications ( NotificationMsg) VALUES ('$message')";
  
  if(mysqli_query($conn, $sql2)){
    //echo "Request has been sent successfully!";
    mail("landlord_anzelab@mail.ru", "Tenancy agreement accepted", $message);
    mysqli_query($conn, $sql_notification);
    }else{echo "something wrong";}
  }
    //$email= $_GET['email'];
	

	$sql = "SELECT * FROM agreements WHERE email='a.s.bobrovskaja@gmail.com'";
	$rs = mysqli_query($conn, $sql);
  $fetchRow = mysqli_fetch_assoc($rs);
  //  echo $fetchRow['aStatus'];
	$aStatus=$fetchRow['aStatus'];
	if ($aStatus=="1"){
		echo '<script type="text/javascript">
		function confirm_alert(node){return confirm("Terms and conditions have already been established and approved, changes cannot be made until all parties involved review and approve them. The Landlord will be notified of your requests.");}
		</script>';
  }
	
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
            <a class="active" href="tenants2.php"><i class="las la-user-friends"></i> Tennats</a>
          </li>
          <li>
            <a href=""><i class="las la-comment-dots"></i> Messages</a>
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
	  
	  
     <title> Agreement for tenant</title>




</head>	
<body>

	
<h2><center>ASSURED SHORTHOLD TENANCY AGREEMENT</center></h2>
<h4><center>For letting a residential dwelling</center><h4>
<!--Date: 28th April 2021-->
<br>Parties: 
<br>
<br>The Landlord:  <a href=""><?php echo $fetchRow['landFirstName']?></a>
<br>Landlord's Surname:  <a href=""><?php echo $fetchRow['landLastName']?></a>
<br>
<br>The Tenant: <a href=""><?php echo $fetchRow['tfirstName']?></a>
<br>The Tenant' Surname: <a href=""><?php echo $fetchRow['tlastName']?></a>
<br>
<br>Property: The property known as  <a href=""><?php echo $fetchRow['street']?> <a href=""><?php echo $fetchRow['city']?> <a href=""><?php echo $fetchRow['postcode']?> </a> together with any fixtures, fittings, furnishings and
appliances listed in the attached inventory
<br>Term: The term will start on  <a href=""> <?php echo $fetchRow['startDate']?></a> and end on <a href="test.test.php"> <?php echo $fetchRow['endDate']?> <a/> 
<br>Rent: £<a href="change_price.php?email=a.s.bobrovskaja@gmail.com" onclick="return confirm_alert(this);"> <?php echo $fetchRow['rent']?> </a> per Month
<br>Payable: In advance by equal Monthly payments without any deduction whatsoever
the first payment to be made on the signing hereof.
<br>Deposit: £<a href=""> <?php echo $fetchRow['deposit']?></a> payable on <a href="test.test.php"> <?php echo $fetchRow['paymentDate']?></a>
<br><br>
<br><center>

<form action="tenants2.php" method="post" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditionsof agreement'); return false; }">
    <input type="checkbox" required name="checkbox" value="check" id="agree" /> I have read and agree to the Terms and Conditions of the tenancy agreement
    <br><br><left><button type="submit" class="btn" name="agree" style="width: 110px;
    height: 35px;
    margin: 0 10px;
    background: linear-gradient(to right, #ADD8E6 , #7EB6FF);
    border-radius: 30px;
    border: 0;
    outline: none;
    color: #fff;
    cursor: pointer;">Submit</button></left>
</form></center>


      </main>
    </div>
  </body>
</html>
