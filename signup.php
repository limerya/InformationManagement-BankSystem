<?php
// Database connection
// $host = 'localhost:3306';
// $username = 'root';
// $password = '2223Untalan';
// $database = 'BANK_SYSTEM';

// $conn = new mysqli($host, $username, $password, $database);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Function to check if CL_ID already exists
// function is_cl_id_exists($cl_id, $conn) {
//     $sql = "SELECT COUNT(*) FROM CLIENT WHERE CL_ID = '$cl_id'";
//     $result = $conn->query($sql);
//     $row = $result->fetch_row();
//     return $row[0] > 0;
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//     $contact = $_POST['number'];
//     $acc_type = $_POST['accountType']; 

//     // Generate unique CL_ID and ACC_ID
//     do {
//         $cl_id = 'CL_' . substr(bin2hex(random_bytes(2)), 0, 2); // 2-character random string after 'CL_'
//     } while (is_cl_id_exists($cl_id, $conn));

//     $acc_id = 'ACC_' . bin2hex(random_bytes()); // 8-character random string for ACC_ID

//     $client_sql = "INSERT INTO CLIENT (CL_ID, CL_NAME, CL_ADDRESS, CL_PHONE, CL_EMAIL)
//                    VALUES ('$cl_id', '$username', 'Default Address', '$contact', '$email')";

//     $account_sql = "INSERT INTO ACCOUNT (ACC_ID, ACC_STATUS, ACC_TYPE)
//                     VALUES ('$acc_id', 'Active', '$acc_type')";

//     if ($acc_type == 'savings') {
//         $account_details_sql = "INSERT INTO SAVINGS (ACC_ID, SAV_BAL, SAV_RATE, SAV_PIN)
//                                 VALUES ('$acc_id', 0.00, 0.05, '123456')";
//     } else if ($acc_type == 'credit') {
//         $account_details_sql = "INSERT INTO CREDIT (ACC_ID, CRD_LIMIT, CRD_SCR, CRD_BALANCE, CRD_PIN)
//                                 VALUES ('$acc_id', 10000.00, 700, 0.00, '123456')";
//     }

//     $records_sql = "INSERT INTO RECORDS (CL_ID, ACC_ID)
//                     VALUES ('$cl_id', '$acc_id')";
                    
//     if ($conn->query($client_sql) === TRUE &&
//         $conn->query($account_sql) === TRUE &&
//         $conn->query($account_details_sql) === TRUE &&
//         $conn->query($records_sql) === TRUE) {
//         echo "Registration successful!";
//     } else {
//         echo "Error: " . $conn->error;
//     }

//     // $conn->close();
// }
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
        font-size: 13pt;
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
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Create Username" required>

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Create Password" required>

      <label for="confirm-password">Confirm Password</label>
      <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>

      <label for="number">Contact No.</label>
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

