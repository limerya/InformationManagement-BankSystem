<?php
    $user = "root";
    $password = "12345";
    $database = "BANK_SYSTEM";
    $servername = "localhost:3310";

    $mysqli = new mysqli($servername, $user, $password, $database); #TO access mysql database content

    #Connecting to the database
    if($mysqli -> connect_error)
    {
        die('Connect Error('.$mysqli->connect_errno.')'.$mysqli->connect_error);
    }
    #checking existance of client
    $uname = $_REQUEST['uname'];
    $psw = $_REQUEST['psw'];
    $sql = "SELECT COUNT(*) AS COUNTS, ACC_ID, CL_ID FROM RECORDS WHERE CL_ID = '$uname'";
    $query = $mysqli -> query($sql);
    $result = $query -> fetch_assoc();

    if($result['COUNTS'] == 0)
    {
        header('Location:error.html');
        exit();
    }

    elseif($result['COUNTS'] == 1)
    {   
        $acidtemp = $result['ACC_ID'];
        $sql1 = "SELECT ACC_TYPE FROM ACCOUNT WHERE ACC_ID = '$acidtemp'";
        $query1 = $mysqli -> query($sql1);
        $result1 = $query1 -> fetch_assoc();

        if($resul1['ACC_TYPE'] == 'savings')
        {   
            header('savings.html');
            exit();
        }
    }
    
    else
    {
        while($row = $result2 -> fetch_assoc())
        {   
            $rowID = $row['ACC_ID'];
            $checker2 = "SELECT ACC_ID, ACC_TYPE FROM ACCOUNT WHERE ACC_ID = '$rowID'";
            $querychecker2 = $mysqli -> query($checker2);
            $resultchecker2 = $querychecker2 -> fetch_assoc();
            if($resultchecker2['ACC_TYPE'] == 'credit')
            {
                $acc_id = $resultchecker2['ACC_ID'];
                $acc_type = $resultchecker2['ACC_TYPE'];
            }
        }
    }

    $passchecker = "SELECT * FROM CLIENT WHERE CL_ID = '$uname'";
    $passquery = $mysqli -> query($passchecker);
    $pass_result = $pass_query -> fetch_assoc();

    if($pass_result['CL_PIN'] != $psw)
    {
        header('Location:error.html');
        exit();
    }
    
    $origin = "SELECT * FROM CREDIT WHERE ACC_ID = '$acc_id'";
    $originquery = $mysqli -> query($origin);
    $resultquery = $originquery -> fetch_assoc();

    $mysqli -> close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Details</title>
    <link rel="stylesheet" href="creditcss.css">
</head>
<body>
    <div class="container">
        <form>
            <a class="exit-btn">Exit</a>
            <a class="logout-btn">Logout</a>
            <a class="delete-btn" href="delete account.html">Delete Account</a>
        </form>
        <h1>Credit Account Details</h1>
        <table>
            <thead>
                <tr>
                    <th>Credit Score</th>
                    <th>Credit Limit</th>
                    <th>Credit Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($resultquery = $originquery -> fetch_assoc())
                    {
                ?>
                <tr>
                    <td><?php echo $resultquery['CRD_SCR']?></td>
                    <td><?php echo $resultquery['CRD_LIMIT']?></td>
                    <td><?php echo $resultquery['CRD_BALANCE']?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <div class="payment-form">
            <form>
                <label for="payment-amount">Enter Amount to Pay:</label>
                <input type="number" id="payment-amount" name="payment_amount" min="0" step="0.01" required>
                <button type="submit">Pay Now</button>
            </form>
    </div>
</body>
</html>
