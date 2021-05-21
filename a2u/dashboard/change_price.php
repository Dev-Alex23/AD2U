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


$done="";
$Email= $_GET['email'];
//$TenantName="Anzela";

$sql1 = "SELECT * FROM agreements WHERE email='$Email'";
$rs = mysqli_query($conn, $sql1);
//get row
$fetchRow = mysqli_fetch_assoc($rs);
$name=$fetchRow['tfirstName'];
$surname=$fetchRow['tlastName'];
$headers[]="MIME-Version: 1.0";
$headers[]="Content-type: text/html; charset=iso-8859-1";
$message = " 
<html>
<body>
Please view requested changes from tenant $name $surname <a href= 'http://localhost/AD2U/a2u/dashboard/viewrequest.php'> here </a>
</body>
</html>";
$message_tenant="Please follow the link to review an agreement http://localhost/index.php?email=$Email";
if(isset($_POST['submit']))
{    
     $rent = $_POST['RentAmountChange'];
     $msg = $_POST['MsgRentChange'];
     $id="1";

     $sql = "INSERT INTO agreementchanges (AgreementID, RentAmountChange,MsgRentChange)
     VALUES ('$id','$rent','$msg')";
     $sql_notification="INSERT INTO notifications ( NotificationMsg)
     VALUES ('$message')";
     
     if (mysqli_query($conn, $sql)) {
        $done="Request has been sent successfully!";
        mail("landlord_anzelab@mail.ru", "Tenant $name $surname requested some agreement changes", $message, implode("\r\n",$headers));
        mysqli_query($conn, $sql_notification);
       // mysqli_query($conn, $sql_notification);
        //mail("tenant_a@mail.ru", "View an agreement and accept it or request a change=)", $message_tenant);
        
      } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     //mysqli_close($conn);




}
mysqli_close($conn);
//mail("landlord_anzelab@mail.ru", "Tenant $name requested some agreement changes", $message);
//mail("tenant_a@mail.ru, "View an agreement and accept it or request change", $message_tenant);

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
    <title>Request Change</title>
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
	 
    <form action="change_price.php?email=<?php echo $Email; ?>" method="post">
      <div class="container1">
      <p style='color: red'><?php echo $done ?></p>
        <h1>Request a change</h1>
        <p><b><?php echo $name,' ', $surname ?></b> fill in the form details below to request a change for the rent price.</p>
        
        <hr>

        <label for="FullName"><b>I would like to change the rent price to:</b></label>
        <br><input type="text" placeholder="Enter amount" name="RentAmountChange" required>
        <br>

        <label ><b>Comment if nessesary:</b></label>
        <br>
        <textarea  name="MsgRentChange" rows="5" cols="50" placeholder="Write your message with details here..."></textarea>
      
        <hr>
        <button type="back" class="" onclick="window.location='http://localhost/a2u/dashboard/tenants2.php'" style="width: 110px;
        height: 35px;
        margin: 0 10px;
        background: linear-gradient(to right, #ADD8E6 , #7EB6FF);
        border-radius: 30px;
        border: 0;
        outline: none;
        color: #fff;
        cursor: pointer;">Go Back</button>
        <button type="submit" style="width: 110px; height: 35px; margin: 0 10px; background: linear-gradient(to right, #ADD8E6 , #7EB6FF);
        border-radius: 30px; border: 0; outline: none; color: #fff;
        cursor: pointer;" name="submit" id="button_new">Send</button>
        
      </div>

      
    </form> 
  </main>
</body>
</html>


