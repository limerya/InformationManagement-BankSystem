<?php
// Database connection
$mysqli = new mysqli("localhost", "root", "072405Jb", "BankSystemCourseProject");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Process the Branch table
if (isset($_POST['insert']) && isset($_POST['branch_code'])) {
    $branch_code = $_POST['branch_code'];
    $branch_location = $_POST['branch_location'];
    $mysqli->query("INSERT INTO BRANCH (branch_code, branch_location) VALUES ('$branch_code', '$branch_location')");
} elseif (isset($_POST['update']) && isset($_POST['branch_code'])) {
    $branch_code = $_POST['branch_code'];
    $branch_location = $_POST['branch_location'];
    $mysqli->query("UPDATE BRANCH SET branch_location = '$branch_location' WHERE branch_code = '$branch_code'");
} elseif (isset($_POST['delete']) && isset($_POST['branch_code'])) {
    $branch_code = $_POST['branch_code'];
    $mysqli->query("DELETE FROM BRANCH WHERE branch_code = '$branch_code'");
}

// Process the Employee table
if (isset($_POST['insert']) && isset($_POST['employee_id'])) {
    $employee_id = $_POST['employee_id'];
    $employee_name = $_POST['employee_name'];
    $employee_phone = $_POST['employee_phone'];
    $employee_pin = $_POST['employee_pin'];
    $branch_code = $_POST['branch_code'];
    $mysqli->query("INSERT INTO EMPLOYEE (employee_id, employee_name, employee_phone, employee_pin, branch_code) VALUES ('$employee_id', '$employee_name', '$employee_phone', '$employee_pin', '$branch_code')");
} elseif (isset($_POST['update']) && isset($_POST['employee_id'])) {
    $employee_id = $_POST['employee_id'];
    $employee_name = $_POST['employee_name'];
    $employee_phone = $_POST['employee_phone'];
    $employee_pin = $_POST['employee_pin'];
    $branch_code = $_POST['branch_code'];
    $mysqli->query("UPDATE EMPLOYEE SET employee_name = '$employee_name', employee_phone = '$employee_phone', employee_pin = '$employee_pin', branch_code = '$branch_code' WHERE employee_id = '$employee_id'");
} elseif (isset($_POST['delete']) && isset($_POST['employee_id'])) {
    $employee_id = $_POST['employee_id'];
    $mysqli->query("DELETE FROM EMPLOYEE WHERE employee_id = '$employee_id'");
}

// Process the Transaction table
if (isset($_POST['insert']) && isset($_POST['transaction_number'])) {
    $transaction_number = $_POST['transaction_number'];
    $transaction_type = $_POST['transaction_type'];
    $transaction_amount = $_POST['transaction_amount'];
    $employee_id = $_POST['employee_id'];
    $client_id = $_POST['client_id'];
    $account_id = $_POST['account_id'];
    $mysqli->query("INSERT INTO TRANSACTION (transaction_number, transaction_type, transaction_amount, employee_id, client_id, account_id) VALUES ('$transaction_number', '$transaction_type', '$transaction_amount', '$employee_id', '$client_id', '$account_id')");
} elseif (isset($_POST['update']) && isset($_POST['transaction_number'])) {
    $transaction_number = $_POST['transaction_number'];
    $transaction_type = $_POST['transaction_type'];
    $transaction_amount = $_POST['transaction_amount'];
    $employee_id = $_POST['employee_id'];
    $client_id = $_POST['client_id'];
    $account_id = $_POST['account_id'];
    $mysqli->query("UPDATE TRANSACTION SET transaction_type = '$transaction_type', transaction_amount = '$transaction_amount', employee_id = '$employee_id', client_id = '$client_id', account_id = '$account_id' WHERE transaction_number = '$transaction_number'");
} elseif (isset($_POST['delete']) && isset($_POST['transaction_number'])) {
    $transaction_number = $_POST['transaction_number'];
    $mysqli->query("DELETE FROM TRANSACTION WHERE transaction_number = '$transaction_number'");
}

// Process the Client table
if (isset($_POST['insert']) && isset($_POST['client_id'])) {
    $client_id = $_POST['client_id'];
    $client_name = $_POST['client_name'];
    $client_address = $_POST['client_address'];
    $client_phone = $_POST['client_phone'];
    $client_email = $_POST['client_email'];
    $mysqli->query("INSERT INTO CLIENT (client_id, client_name, client_address, client_phone, client_email) VALUES ('$client_id', '$client_name', '$client_address', '$client_phone', '$client_email')");
} elseif (isset($_POST['update']) && isset($_POST['client_id'])) {
    $client_id = $_POST['client_id'];
    $client_name = $_POST['client_name'];
    $client_address = $_POST['client_address'];
    $client_phone = $_POST['client_phone'];
    $client_email = $_POST['client_email'];
    $mysqli->query("UPDATE CLIENT SET client_name = '$client_name', client_address = '$client_address', client_phone = '$client_phone', client_email = '$client_email' WHERE client_id = '$client_id'");
} elseif (isset($_POST['delete']) && isset($_POST['client_id'])) {
    $client_id = $_POST['client_id'];
    $mysqli->query("DELETE FROM CLIENT WHERE client_id = '$client_id'");
}

// Process the Records table
if (isset($_POST['insert']) && isset($_POST['client_id']) && isset($_POST['account_id'])) {
    $client_id = $_POST['client_id'];
    $account_id = $_POST['account_id'];
    $mysqli->query("INSERT INTO RECORDS (client_id, account_id) VALUES ('$client_id', '$account_id')");
} elseif (isset($_POST['update']) && isset($_POST['client_id']) && isset($_POST['account_id'])) {
    $client_id = $_POST['client_id'];
    $account_id = $_POST['account_id'];
    $mysqli->query("UPDATE RECORDS SET account_id = '$account_id' WHERE client_id = '$client_id'");
} elseif (isset($_POST['delete']) && isset($_POST['client_id']) && isset($_POST['account_id'])) {
    $client_id = $_POST['client_id'];
    $account_id = $_POST['account_id'];
    $mysqli->query("DELETE FROM RECORDS WHERE client_id = '$client_id' AND account_id = '$account_id'");
}

// Process the Account table
if (isset($_POST['insert']) && isset($_POST['account_id'])) {
    $account_id = $_POST['account_id'];
    $account_status = $_POST['account_status'];
    $account_type = $_POST['account_type'];
    $mysqli->query("INSERT INTO ACCOUNT (account_id, account_status, account_type) VALUES ('$account_id', '$account_status', '$account_type')");
} elseif (isset($_POST['update']) && isset($_POST['account_id'])) {
    $account_id = $_POST['account_id'];
    $account_status = $_POST['account_status'];
    $account_type = $_POST['account_type'];
    $mysqli->query("UPDATE ACCOUNT SET account_status = '$account_status', account_type = '$account_type' WHERE account_id = '$account_id'");
} elseif (isset($_POST['delete']) && isset($_POST['account_id'])) {
    $account_id = $_POST['account_id'];
    $mysqli->query("DELETE FROM ACCOUNT WHERE account_id = '$account_id'");
}

// Process the Credit table
if (isset($_POST['insert']) && isset($_POST['account_id'])) {
    $account_id = $_POST['account_id'];
    $credit_limit = $_POST['credit_limit'];
    $credit_score = $_POST['credit_score'];
    $credit_balance = $_POST['credit_balance'];
    $credit_pin = $_POST['credit_pin'];
    $mysqli->query("INSERT INTO CREDIT (account_id, credit_limit, credit_score, credit_balance, credit_pin) VALUES ('$account_id', '$credit_limit', '$credit_score', '$credit_balance', '$credit_pin')");
} elseif (isset($_POST['update']) && isset($_POST['account_id'])) {
    $account_id = $_POST['account_id'];
    $credit_limit = $_POST['credit_limit'];
    $credit_score = $_POST['credit_score'];
    $credit_balance = $_POST['credit_balance'];
    $credit_pin = $_POST['credit_pin'];
    $mysqli->query("UPDATE CREDIT SET credit_limit = '$credit_limit', credit_score = '$credit_score', credit_balance = '$credit_balance', credit_pin = '$credit_pin' WHERE account_id = '$account_id'");
} elseif (isset($_POST['delete']) && isset($_POST['account_id'])) {
    $account_id = $_POST['account_id'];
    $mysqli->query("DELETE FROM CREDIT WHERE account_id = '$account_id'");
}

// Process the Savings table
if (isset($_POST['insert']) && isset($_POST['account_id'])) {
    $account_id = $_POST['account_id'];
    $savings_balance = $_POST['savings_balance'];
    $savings_rate = $_POST['savings_rate'];
    $savings_pin = $_POST['savings_pin'];
    $mysqli->query("INSERT INTO SAVINGS (account_id, savings_balance, savings_rate, savings_pin) VALUES ('$account_id', '$savings_balance', '$savings_rate', '$savings_pin')");
} elseif (isset($_POST['update']) && isset($_POST['account_id'])) {
    $account_id = $_POST['account_id'];
    $savings_balance = $_POST['savings_balance'];
    $savings_rate = $_POST['savings_rate'];
    $savings_pin = $_POST['savings_pin'];
    $mysqli->query("UPDATE SAVINGS SET savings_balance = '$savings_balance', savings_rate = '$savings_rate', savings_pin = '$savings_pin' WHERE account_id = '$account_id'");
} elseif (isset($_POST['delete']) && isset($_POST['account_id'])) {
    $account_id = $_POST['account_id'];
    $mysqli->query("DELETE FROM SAVINGS WHERE account_id = '$account_id'");
}

// Close the database connection
$mysqli->close();
?>