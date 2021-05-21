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

  if (isset ($_POST['next1'])){
    $msg="interesting!";
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

  $done='';
  $headers[]="MIME-Version: 1.0";
  $headers[]="Content-type: text/html; charset=iso-8859-1";
  $message = " 
  <html>
  <body>
  Please review your new tenancy agreement <a href= 'http://localhost/AD2U/a2u/dashboard/tenants2.php'> here </a>
  </body>
  </html>";
  if(isset($_POST['submit']))
   {    
       $tfirstName=$_POST['tfirstName'];
       $tlastName=$_POST['tlastName'];
       $email=$_POST['email'];
       $landFirstName=$_POST['landFirstName'];
       $landLastName=$_POST['landLastName'];
       $landAddress=$_POST['landAddress'];
       $propertyAddress=$_POST['propertyAddress'];
       $startDate=$_POST['startDate'];
       $endDate=$_POST['endDate'];
       $rent=$_POST['rent'];
       $paymentDate=$_POST['paymentDate'];
       $deposit=$_POST['deposit'];

 
       $sql = "INSERT INTO agreements (tfirstName, tlastName, email, landFirstName, landLastName, landAddress, propertyAddress, startDate, endDate, rent, paymentDate, deposit)
       VALUES ('$tfirstName', '$tlastName', '$email', '$landFirstName', '$landLastName', '$landAddress', '$propertyAddress', '$startDate', '$endDate', '$rent','$paymentDate', '$deposit')";
            
       if (mysqli_query($conn, $sql)) {
          $done="A new agreement has been created and the request to review it have been sent to the tenant!";
          mail("tenant_a@mail.ru", "Your tenancy agreement is ready to review", $message, implode("\r\n",$headers));
        } else {
          echo "Error: " . $sql . ":-" . mysqli_error($conn);}
       
   
    }
  mysqli_close($conn);
  
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="/a2u/css/style.css">
    <link rel="stylesheet" href="/a2u/css/dashboard.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
    />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
            <a class="active" href="agreement.php"><i class="las la-file-contract"></i> Agreements</a>
          </li>
		  
          <li>
            <a href="tenants2.php"><i class="las la-user-friends"></i> Tennats</a>
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
    <div class="container">
    <p style='color: red'><?php echo $done ?></p>
      <header>Create a new agreement</header>
      <div class="step-row">
	 <div id="progress"></div>
		<div class="step-col"><small>Step 1</small></div>
		<div class="step-col"><small>Step 2</small></div>
		<div class="step-col"><small>Step 3</small></div>
	</div>
      <div class="form-outer">
        <form action="agreement_new.php" method="post">
          <div class="page slide-page">
            <div class="title">Tenant details:</div>
            <div class="field">
              <div class="label">First Name</div>
              <input type="text" name="tfirstName">
            </div>
            <div class="field">
              <div class="label">Last Name</div>
              <input type="text" name="tlastName">
            </div>
            <div class="field">
              <div class="label">Email</div>
              <input type="text" name="email">
            </div>
            
            <div class="title">Landlord details:</div>
            <div class="field">
              <div class="label">First Name</div>
              <input type="text" name="landFirstName">
            </div>
            <div class="field">
              <div class="label">Last Name</div>
              <input type="text" name="landLastName">
            </div>
            <div class="field">
              <div class="label">Address</div>
              <input type="text" name="landAddress">
            </div>
            <div class="field">
              <button class="firstNext next" id="Next1">Next</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Property and Term</div>
            <div class="field">
              <div class="label">Property Address</div>
              <input type="text" name="propertyAddress">
            </div>
            <div class="field">
              <div class="label">Number of Bedrooms</div>
              <input type="number">
            </div>
            <div class="field">
              <div class="label">Term Starts on</div>
              <input type="Date" name="startDate">
            </div>
            <div class="field">
              <div class="label">Term Ends on</div>
              <input type="Date" name="endDate">
            </div>
            <div class="field">
              <div class="label">Break Clause (in months)</div>
              <input type="number">
            </div>
            <div class="field btns">
              <button class="prev-1 prev" id="Back1">Previous</button>
              <button class="next-1 next" id ="Next2">Next</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Payments</div>
            <div class="field">
              <div class="label">Rent Amount</div>
              <input type="number" name="rent">
            </div>
            <div class="field">
              <div class="label">Rent Paid on</div>
              <input type="date" name="paymentDate">
            </div>
            <div class="field">
              <div class="label">Deposit Amount</div>
              <input type="number" name="deposit">
            </div>
            <div class="field">
              <div class="label">Deposit Paid on</div>
              <input type="date">
            </div>
            <div class="field">
              <div class="label">Late Payment Fee</div>
              <input type="number">
            </div>
            <div class="field">
              <div class="label">Number of Occupants</div>
              <input type="number">
            </div>
            <div class="field btns">
              <button class="prev-2 prev" id="Back2">Previous</button>
              <button class="submit" type="submit" name="submit">Submit</button>

            </div>
            <div class="field btns">
                    <form  onsubmit="return checkForm(this);">
                    <input type="checkbox" required name="checkbox" value="check" id="check" /> 
                    <div id="cond">I accept  the <a href="agreements\rental_agreement_designed.pdf" >  Terms and Conditions <a/></div>
                    </form> 
            </div>
          </div>

         
        </form>
      </div>
    </div>
    <script src="/a2u/script.js"></script>

  </body>
</html>
