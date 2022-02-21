<?php
//include 'db.php';

$uip = getUserIpAddr();
$dog = filter_var($_POST['dog'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$cat = filter_var($_POST['cat'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$hash_cat = password_hash($cat, PASSWORD_DEFAULT);
$verify_cat = password_verify($cat, $hash_cat);
/* $user_sql = "SELECT user FROM users where user LIKE '". $dog ."'";
$pass_sql = "SELECT pass FROM users where pass LIKE '". $cat ."'";
$rus = mysqli_query($conn, $user_sql);
$rps = mysqli_query($conn, $pass_sql); */

if ($verify_cat) {
    echo json_encode(array('x'=>$hash_cat, 'ip'=>$uip));
}
else {
    echo json_encode(array('x'=>"will never happened, like never. this is not supposed to work", 'ip'=>$uip));
}
//json($dog,$hash_cat,$uip);

function json($x, $y, $ip)
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