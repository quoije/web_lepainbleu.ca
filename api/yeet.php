<?php
include 'db.php';

$uip = getUserIpAddr();
$dog = filter_var($_POST['dog'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$cat = filter_var($_POST['cat'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$hash_cat = password_hash($cat, PASSWORD_DEFAULT);
$user_sql = "SELECT user FROM users where user LIKE '". $dog ."'";
$pass_sql = "SELECT pass FROM users where user LIKE '". $dog ."'";
$rus = mysqli_query($conn, $user_sql);
$rps = mysqli_query($conn, $pass_sql);

if ($rus->num_rows > 0) {
    while($row = $rps->fetch_assoc()) {
        $oof = password_verify($cat, $row["pass"]);
        if ($oof)
        {
            setcookie("user", $dog, time() + (86400 * 30), "/");
            setcookie("pass", $row["pass"], time() + (86400 * 30), "/");
            echo "redirect";
        }
        else
        {
        }
    }
  } else {
    echo "no result :(";
  }
  $conn->close();

function jsonLogin($x, $y, $ip)
{
    header("Content-type: application/json");
    echo json_encode(array('x'=>$x, 'y'=>$y, 'ip'=>$ip));
}

function getUserIpAddr()
{

    if (!empty($_SERVER['HTTP_CLIENT_IP']))
{
    $ip = $_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
{
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else 
{
    $ip = $_SERVER['REMOTE_ADDR'];
}
return $ip;

/// Source - https://www.codexworld.com/how-to/get-user-ip-address-php/
}

?>
