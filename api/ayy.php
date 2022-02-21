<?php

include 'db.php';

$ip = getUserIpAddr();
$query2 = "SELECT * FROM achieved";
$query3 = "SELECT ip FROM achieved where ip LIKE '". $ip ."'";
$query4 = "SELECT * FROM quotes";
$query5 = "SELECT ip FROM quotes where ip LIKE '". $ip ."'";
$str = "nah non le gros ya pas de electricite la dedans - chabot 1923";
$sui = "cocaine";
$noi = "noises";
$quotestr = "quote:";
$strb64 = base64_encode($str);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);
$result4 = mysqli_query($conn, $query4);
$result5 = mysqli_query($conn, $query5);
$num;
$ach = mysqli_num_rows($result2);
$id = mysqli_num_rows($result2) + 1;
$idquotes = mysqli_num_rows($result4) + 1;
$num3 = mysqli_num_rows($result3);
$num5 = mysqli_num_rows($result5);

if (isset($_GET["ach"]))
{
    
    if ($num5>0 && $num3>0)
    {
        echo "<b>" . $ach . "</b> || good shit boiis <3 <br> quote already added";
    }
    else if ($num3>0)
    {
        echo "<b>" . $ach . "</b> || good shit boiis <3 <br> you can add your quote by entering <i><b>quote:your quote</b></i>";
    }
    else
    {
        echo "<b>" . $ach . "</b>";
    }
}

if (isset($_POST["invite"]))
{
    $query = "SELECT code FROM invites where code LIKE '". $_POST["invite"] ."'";
    $result = mysqli_query($conn, $query);
    $num =  mysqli_num_rows($result);

    if (strpos($_POST["invite"], $quotestr) !== false && $num3>0)
    {
        if ($num5 > 0)
        {
        json("quote.alreadyadded");
        }
        else
        {
        $quote = str_replace($quotestr, "", $_POST["invite"]);
        $sqlquote = "INSERT into quotes (id, quote, ip) VALUES ('". $idquotes ."', '" . $quote . "', '" . $ip . "')";

        if (mysqli_query($conn, $sqlquote))
        json("db.success");
        else
        {
            json("db.error");
        }
        
        }
    }

    elseif ($_POST["invite"] == $noi)
    {
        json("noi");
    }

    elseif ($_POST["invite"] == $sui)
    {
        json("sui");
    }

    elseif ($_POST["invite"] == $str)
    {
        json($strb64);
    }

    elseif ($num>0)
    {
        if ($num3>0)
        {
            json("already.done");
        }
        else
        {
            $sql = "INSERT into achieved (id, ip) VALUES ('". $id ."', '" . $ip . "')";
            mysqli_query($conn, $sql);
            json(true);
        }
    }

    else
    {
        json(false);
    }
}

function getUserIpAddr()
{
// https://www.codexworld.com/how-to/get-user-ip-address-php/
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
}

function json($x)
{
    header("Content-type: application/json");
    echo json_encode(array('x'=>$x));
}



?>