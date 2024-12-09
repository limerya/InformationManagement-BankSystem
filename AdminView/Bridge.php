<?php
    $adminname = '0001';
    $pass = '1234';

    $inputname = $_REQUEST['uname'];
    $inputpass = $_REQUEST['psw'];

    if($adminname !== $inputname | $inputpass !== $pass)
    {
        header('Location:http://localhost/Final/AdminView/error2.html');
        exit();
    }

    else
    {
        header('Location:http://localhost/Final/AdminView/AdminView.php');
        exit();
    }

?>