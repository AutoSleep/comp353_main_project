<?php include 'employer_header.php' ?>
<title>Membership</title>
<?php include 'employer_navbar.php' ?>
<?php

$bank_num_err = "";

// Processing form data when form is submitted
if(isset($_POST['SubmitButton'])){

    $bank_num = $_POST['bank_num'];
    $method_of_payment = $_POST["method_of_payment"];
    $auto_withdrawal = $_POST["auto_withdrawal"];
    $date_of_payment = $_POST["date_of_payment"];
    $membership = $_POST["membership"];
    $username = $_SESSION['username'];
    $sql = "SELECT id FROM User WHERE username='$username'";
    $user_id = "";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $user_id = $row['id'];
        }
    }

    $bank_num_err = $date_err = " ";

    if (empty($bank_num)){
        $bank_num_err = "Please Enter Valid Bank Account.";
    }
    if (empty($date_of_payment)){
        $date_err = "Please Enter Valid Date.";
    }
    $sql = "INSERT INTO m_Payment (bank_number,method_of_payment,auto_withdrawal,date_of_payment,id) VALUES ('$bank_num', '$method_of_payment','$auto_withdrawal','$date_of_payment','$user_id')
    ON DUPLICATE KEY UPDATE method_of_payment='$method_of_payment', auto_withdrawal='$auto_withdrawal', date_of_payment='$date_of_payment', id='$user_id';
    UPDATE User SET membership='$membership' WHERE id='$user_id';";
    if(mysqli_multi_query($link, $sql)){

        echo "Membership records saved successfully!";
    }
    else{
        echo "Error:".$sql."<br>".mysqli_error($link);
    }
    mysqli_close($link);
}
?>
<div class="row">
    <div class="col-sm-6">
        <h1>Prime Membership</h1>
        <p>Post up to 5 jobs<br><em>$50/month</em></p>
    </div>
    <div class="col-sm-6">
        <h1>Gold Membership</h1>
        <p>Unlimited job postings<br><em>$100/month</em></p>
    </div>
</div>
<div class="col">
    <h1>Payment</h1>
    <form action= " " method = "POST" >

        <div class="form-group <?php echo (!empty($bank_num_err)) ? 'has-error': ''; ?>">
            <label>Bank Account:</label>
            <input type="text" name="bank_num" class="form-control" value="<?php echo $bank_num; ?>">
            <span class="help-block"><?php echo $bank_num_err; ?></span>
        </div>

        <div class="form-group">
            <label>Membership:</label>
                <select class="form-control" name="membership">
                    <option value="Prime">Prime Membership</option>
                    <option value="Gold">Gold Membership</option>
                </select>
        </div>
        <div class="form-group">
            <label>Method of Payment:</label>
                <select class="form-control" name="method_of_payment">
                    <option value="CreditCard">Credit Card</option>
                    <option value="CheckingAcc">Checking Account</option>
                </select>
        </div>
        <div class="form-group">
            <label>Method of Withdrawal:</label>
                <select class="form-control" name="auto_withdrawal">
                    <option value="auto">Auto</option>
                    <option value="manual">Manual</option>
                </select>
        </div>
        <div class="form-group <?php echo (!empty($date_err)) ? 'has-error': ''; ?>"">
            <label>Date:</label>
            <input type="date" name="date_of_payment" placeholder="0000-00-00">
                <span class="help-block"><?php echo $date_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="SubmitButton">
        </div>
    </form>
</div>
<?php include 'employer_footer.php' ?>