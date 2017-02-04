<?php
  require_once("secrets.php");
  $auth = false;
  if (isset($_COOKIE["auth"])) {
     $auth = unserialize($_COOKIE["auth"]);
     $hsh = $_COOKIE["hsh"];
     if ($hsh !== hash("sha256", $SECRET . strrev($_COOKIE["auth"]))) {
       $auth = false;
     }
  }
  else {
    $auth = false;
    $s = serialize($auth);
    setcookie("auth", $s);
    setcookie("hsh", hash("sha256", $SECRET . strrev($s)));
  }
  if ($auth) {
    if (isset($_GET['query'])) {
        $mysql = new mysqli('localhost', $SQL_USER, $SQL_PASSWORD, $SQL_DATABASE);
        
        $qstr = $mysql->real_escape_string($_GET['query']);
        $query = "SELECT amount FROM plaidcoin_wallets WHERE id=$qstr";
        $result = $mysql->query($query);
        $line = $result->fetch_array(MYSQLI_ASSOC);
        foreach ($line as $col_value) {
          echo "Wallet " . $_GET['query'] . " contains " . $col_value . " coins.";
        }
    }
    else {
       echo "<html><head><title>MtPOX Admin Page</title></head><body>Welcome to the admin panel!<br /><br /><form name='input' action='admin.php' method='get'>Wallet ID: <input type='text' name='query'><input type='submit' value='Submit Query'></form></body></html>";}
  }
  else {
    echo "Sorry, not authorized.";
  }

?>
