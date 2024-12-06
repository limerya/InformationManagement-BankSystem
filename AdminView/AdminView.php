<?php
    $user = "root";
    $password = "1234";
    $database = "BANK_SYSTEM";
    $servername = "localhost:3310";

    $mysqli = new mysqli($servername, $user, $password, $database); #TO access mysql database content

    #Connecting to the database
    if($mysqli -> connect_error)
    {
        die('Connect Error('.$mysqli->connect_errno.')'.$mysqli->connect_error);
    }

    $query1 = 'SELECT * FROM BRANCH';
    $result1 = $mysqli -> query($query1);

    $query2 = 'SELECT * FROM EMPLOYEE';
    $result2 = $mysqli -> query($query2);

    $query3 = 'SELECT * FROM TRANSACTION';
    $result3 = $mysqli -> query($query3);

    $query4 = 'SELECT * FROM CLIENT';
    $result4 = $mysqli -> query($query4);
    
    $query5 = 'SELECT * FROM RECORDS';
    $result5 = $mysqli -> query($query5);

    $query6 = 'SELECT * FROM ACCOUNT';
    $result6 = $mysqli -> query($query6);
    
    $query7 = 'SELECT * FROM CREDIT';
    $result7 = $mysqli -> query($query7);

    $query8 = 'SELECT * FROM SAVINGS';
    $result8 = $mysqli -> query($query8);

    $mysqli -> close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" 
        rel="stylesheet">

        <style type='text/css'>
            table,th,td 
                {
                    border: 1px solid;
                }

            body
            {
                font-family: "Lato", sans-serif;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class=>
                <h2>Branch Table</h2>
                <table>
                    <tr>
                        <th>Branch Code</th>
                        <th>Branch Location</th>
                    </tr>
                    <?php
                        while($row1 = $result1 -> fetch_assoc())
                        {
                    ?>
                    <tr>
                        <td><?php echo $row1['BRANCH_CODE'] ?></td>
                        <td><?php echo $row1['BRANCH_LOCATION'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                <div>
                <div>
                    <form action="action1.php" method="POST">
                        <label for="placeholder">Branch Code</label>
                        <input type="text" name="branch_code" required> <br>
                        <label for="placeholder2">Branch Location</label>
                        <input type="text" name="branch_location" required>
                        <br>
                        <input type="submit" name="insert" value="Insert">
                        <input type="submit" name="update" value="Update">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </div>
            </div>
            <div>
                <h2>Employee Table</h2>
                <table>
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Employee Phone</th>
                        <th>Employee Pin</th>
                        <th>Branch Code</th>
                    </tr>
                    <?php
                        while($row2 = $result2 -> fetch_assoc())
                        {
                    ?>
                    <tr>
                        <td><?php echo $row2['EMP_ID'] ?></td>
                        <td><?php echo $row2['EMP_NAME'] ?></td>
                        <td><?php echo $row2['EMP_PHONE'] ?></td>
                        <td><?php echo $row2['EMP_PIN'] ?></td>
                        <td><?php echo $row2['BRANCH_CODE'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table><br>
                <div>
                    <form action="action2.php" method="POST">
                        <input type="submit" name="insert" value="Insert">
                        <input type="submit" name="update" value="Update">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </div>
            </div>
            <div>
                <h2>Transaction Table</h2>
                <table>
                    <tr>
                        <th>Transaction Number</th>
                        <th>Transaction Type</th>
                        <th>Transaction Ammount</th>
                        <th>Employee ID</th>
                        <th>Client ID</th>
                        <th>Account ID</th>
                    </tr>
                    <?php
                        while($row3 = $result3 -> fetch_assoc())
                        {
                    ?>
                    <tr>
                        <td><?php echo $row3['TRANSACT_NUM'] ?></td>
                        <td><?php echo $row3['TRANSACT_TYPE'] ?></td>
                        <td><?php echo $row3['TRANSACT_AMOUNT'] ?></td>
                        <td><?php echo $row3['EMP_ID'] ?></td>
                        <td><?php echo $row3['CL_ID'] ?></td>
                        <td><?php echo $row3['ACC_ID'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table><br>
                <div>
                    <form action="action3.php" method="POST">
                        <input type="submit" name="insert" value="Insert">
                        <input type="submit" name="update" value="Update">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </div>
            </div>
            <div>
                <h2>Client Table</h2>
                <table>
                    <tr>
                        <th>Client ID</th>
                        <th>Client Name</th>
                        <th>Client Address</th>
                        <th>Client Phone</th>
                        <th>Client Email</th>
                    </tr>
                    <?php
                        while($row4 = $result4 -> fetch_assoc())
                        {
                    ?>
                    <tr>
                        <td><?php echo $row4['CL_ID'] ?></td>
                        <td><?php echo $row4['CL_NAME'] ?></td>
                        <td><?php echo $row4['CL_ADDRESS'] ?></td>
                        <td><?php echo $row4['CL_PHONE'] ?></td>
                        <td><?php echo $row4['CL_EMAIL'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table><br>
                <div>
                    <form action="action4.php" method="POST">
                        <input type="submit" name="insert" value="Insert">
                        <input type="submit" name="update" value="Update">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </div>
            </div>
            <div>
                <h2>Records Table</h2>
                <table>
                    <tr>
                        <th>Client ID</th>
                        <th>Account ID</th>
                    </tr>
                    <?php
                        while($row5 = $result5 -> fetch_assoc())
                        {
                    ?>
                    <tr>
                        <td><?php echo $row5['CL_ID'] ?></td>
                        <td><?php echo $row5['ACC_ID'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table><br>
                <div>
                    <form action="action5.php" method="POST">
                        <input type="submit" name="insert" value="Insert">
                        <input type="submit" name="update" value="Update">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </div>
            </div>
            <div>
                <h2>Account Table</h2>
                <table>
                    <tr>
                        <th>Account ID</th>
                        <th>Account Status</th>
                        <th>Account Type</th>
                    </tr>
                    <?php
                        while($row6 = $result6 -> fetch_assoc())
                        {
                    ?>
                    <tr>
                        <td><?php echo $row6['ACC_ID'] ?></td>
                        <td><?php echo $row6['ACC_STATUS'] ?></td>
                        <td><?php echo $row6['ACC_TYPE'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table><br>
                <div>
                    <form action="action6.php" method="POST">
                        <input type="submit" name="insert" value="Insert">
                        <input type="submit" name="update" value="Update">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </div>
            </div>
            <div>
                <h2>Employee Table</h2>
                <table>
                    <tr>
                        <th>Account ID</th>
                        <th>Creadit Limit</th>
                        <th>Credit Score</th>
                        <th>Credit Balance</th>
                        <th>Credit Pin</th>
                    </tr>
                    <?php
                        while($row7 = $result7 -> fetch_assoc())
                        {
                    ?>
                    <tr>
                        <td><?php echo $row7['ACC_ID'] ?></td>
                        <td><?php echo $row7['CRD_LIMIT'] ?></td>
                        <td><?php echo $row7['CRD_SCR'] ?></td>
                        <td><?php echo $row7['CRD_BALANCE'] ?></td>
                        <td><?php echo $row7['CRD_PIN'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table><br>
                <div>
                    <form action="action7.php" method="POST">
                        <input type="submit" name="insert" value="Insert">
                        <input type="submit" name="update" value="Update">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </div>
            </div>
            <div>
                <h2>Employee Table</h2>
                <table>
                    <tr>
                        <th>Account ID</th>
                        <th>Savings Balance</th>
                        <th>Savings Rate</th>
                        <th>Savings Pin</th>
                    </tr>
                    <?php
                        while($row8 = $result8 -> fetch_assoc())
                        {
                    ?>
                    <tr>
                        <td><?php echo $row8['ACC_ID'] ?></td>
                        <td><?php echo $row8['SAV_BAL'] ?></td>
                        <td><?php echo $row8['SAV_RATE'] ?></td>
                        <td><?php echo $row8['SAV_PIN'] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table><br>
                <div>
                    <form action="action8.php" method="POST">
                        <input type="submit" name="insert" value="Insert">
                        <input type="submit" name="update" value="Update">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
