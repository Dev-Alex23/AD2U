 <?php
 $username = 'root';
  $password = '';
  $mysqlhost = 'localhost';
  $dbname = 'users';

  
  $db = new PDO('mysql:host='.$mysqlhost.';dbname='.$dbname.';charset=utf8', $username, $password);
  if ( $db) {
    // make errors throw exceptions
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  } else {
    die("Could not create PDO connection.");
  }
