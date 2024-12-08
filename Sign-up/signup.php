<?php
$user = "root";
$password = "12345";
$database = "BANK_SYSTEM";
$servername = "localhost:3310";

$mysqli = new mysqli($servername, $user, $password, $database);

if ($mysqli->connect_error) {
    die('Connect Error(' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
}

# Generate new CL_ID
$cur_code = '0001';
$sql = "SELECT IFNULL((SELECT CL_ID FROM CLIENT ORDER BY CL_ID DESC LIMIT 1), 'Has') AS col1";
$query = $mysqli->query($sql);
$result = $query->fetch_assoc();

if ($result['col1'] != 'Has') {
    $lastcode = "SELECT CL_ID FROM CLIENT ORDER BY CL_ID DESC LIMIT 1";
    $lastquery = $mysqli->query($lastcode);
    $lastresult = $lastquery->fetch_assoc();

    $cur_code = $lastresult['CL_ID'] + 1;

    if ($cur_code < 10) {
        $cur_code = "000$cur_code";
    } elseif ($cur_code >= 10 && $cur_code < 100) {
        $cur_code = "00$cur_code";
    } elseif ($cur_code >= 100 && $cur_code < 1000) {
        $cur_code = "0$cur_code";
    } elseif ($cur_code >= 1000 && $cur_code < 10000) {
        $cur_code = (string)$cur_code;
    }
}

# Generate new ACC_ID
$acc_code = '000001';
$sql2 = "SELECT IFNULL((SELECT ACC_ID FROM ACCOUNT ORDER BY ACC_ID DESC LIMIT 1), 'Has') AS col1";
$query2 = $mysqli->query($sql2);
$result2 = $query2->fetch_assoc();

if ($result2['col1'] != 'Has') {
    $lastcode1 = "SELECT ACC_ID FROM ACCOUNT ORDER BY ACC_ID DESC LIMIT 1";
    $lastquery1 = $mysqli->query($lastcode1);
    $lastresult1 = $lastquery1->fetch_assoc();

    $acc_code = $lastresult1['ACC_ID'] + 1;

    if ($acc_code < 10) {
        $acc_code = "0000$acc_code";
    } elseif ($acc_code >= 10 && $acc_code < 100) {
        $acc_code = "000$acc_code";
    } elseif ($acc_code >= 100 && $acc_code < 1000) {
        $acc_code = "00$acc_code";
    } elseif ($acc_code >= 1000 && $acc_code < 10000) {
        $acc_code = "0$acc_code";
    } elseif ($acc_code >= 10000 && $acc_code < 100000) {
        $acc_code = (string)$acc_code;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $contact = $_POST['number'];
    $acc_type = $_POST['accountType'];

    // Need to create specialized error handling messages first
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: error_email_format.html");
        exit();
    }

    // Need to create specialized error handling messages first
    $domain = substr(strrchr($email, "@"), 1);
    if (!checkdnsrr($domain, "MX")) {
        header("Location: error_email_domain.html");
        exit();
    }

    // Need to create specialized error handling messages first
    $regex1 = '/^\+63\d{10}$/';
    if (preg_match($regex1, $contact) == 0) {
        header("Location: error_phone_num.html");
        exit();
    }

    $client_sql = "INSERT INTO CLIENT (CL_ID, CL_NAME, CL_ADDRESS, CL_PHONE, CL_EMAIL)
                   VALUES ('$cur_code', '$username', 'Default Address', '$contact', '$email')";

    $account_sql = "INSERT INTO ACCOUNT (ACC_ID, ACC_STATUS, ACC_TYPE)
                    VALUES ('$acc_code', 'Active', '$acc_type')";

    if ($acc_type == 'savings') {
        $account_details_sql = "INSERT INTO SAVINGS (ACC_ID, SAV_BAL, SAV_RATE, SAV_PIN)
                                VALUES ('$acc_code', 0.00, 0.05, '123456')";
    } elseif ($acc_type == 'credit') {
        $account_details_sql = "INSERT INTO CREDIT (ACC_ID, CRD_LIMIT, CRD_SCR, CRD_BALANCE, CRD_PIN)
                                VALUES ('$acc_code', 10000.00, 700, 0.00, '123456')";
    }

    $records_sql = "INSERT INTO RECORDS (CL_ID, ACC_ID)
                    VALUES ('$cur_code', '$acc_code')";

    if ($mysqli->query($client_sql) === TRUE &&
        $mysqli->query($account_sql) === TRUE &&
        $mysqli->query($account_details_sql) === TRUE &&
        $mysqli->query($records_sql) === TRUE) {
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . $mysqli->error;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <style type="text/css">
      html {
        display: grid;
        min-height: 100%;
        background-color: #e2dfd9;
      }

      body {
        font-family: "Lato", sans-serif;
        margin: auto;
      }

      .container {
          display: flex;
          flex-direction: column; 
          padding: 30px;
          border-radius: 25px; 
          background-color: white;
          box-shadow: 10px 10px 5px gray;
          width: 400px;
          margin: auto;
      }

      h1 {
        text-align: center;
        font-size: 20pt;
        margin-bottom: 20px;
      }

      label {
        font-size: 16pt;
        padding-bottom: 5px;
      }

      .label2 {
        font-size: 10pt;
        padding-bottom: 5px;
      }

      input {
          font-size: 12pt;
          border-radius: 5px;
          border-style: solid;
          border-color: #ccc;
          padding: 8px;
          margin-bottom: 10px;
          width: 100%;
      }

      .submit-btn, .back-btn {
        font-size: 10pt;
        border-style: none;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease;
      }

      .submit-btn {
        background-color: #3f413a;
        color: white;
      }

      .submit-btn:hover {
        background-color: #595c50;
      }

      .back-btn {
        background-color: #3f413a;
        color: white;
      }

      .back-btn:hover {
        background-color: #595c50;
      }

      .options {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 10px;
      }

      .radio-container {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
      }
      .radio-container label {
        display: flex;
        align-items: center;
        gap: 5px;
      }

    </style>
</head>

<body>
  <div class="container">
    <h1>Bank Sign-Up Form</h1>
    <form action="signup.php" method="post">

      <label2> Client Code: <?php echo $cur_code?> <br>
      <label2> Account Code: <?php echo $acc_code?> <br>
      <br>

      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Create Username" required>

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Create Password" required>

      <label for="confirm-password">Confirm Password</label>
      <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>

      <label for="number">Contact No. (+63)</label>
      <input type="text" id="number" name="number" placeholder="Enter your contact number" required>

      <div class="radio-container">
        <label><input type="radio" name="accountType" value="savings" required> Savings</label>
        <label><input type="radio" name="accountType" value="credit"> Credit</label>
      </div>

      <div class="options">
        <button type="submit" class="submit-btn">Sign Up</button>
        <button class="back-btn" type="button" onclick="window.location.href='login.php'">Back to Login</button>
      </div>
    </form>
  </div>
</body>
</html>

