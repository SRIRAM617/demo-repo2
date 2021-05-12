<?php

$con = mysqli_connect("localhost","root","","health");

if (isset($_POST["submit"])) 
{
    $uname = $_POST['uname'];
    $pass = $_POST['password'];

    $sql = mysqli_query($con, "SELECT count(*) as total from public where healthid = '".$uname."' AND password = '".$pass."'");
    $rw = mysqli_fetch_array($sql);

    if ($rw['total']>0)
    {
        session_start();
        $_SESSION['name']=$uname;
        header("location:pubui.php");
    }
    else
    {
       

        header("location:people.php");

    }
}

?>