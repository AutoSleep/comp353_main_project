<?php
// Include config file
require_once "config.php";

$bank_num_err = "";

// Processing form data when form is submitted
if(isset($_POST['SubmitButton'])){

    $bank_num = $_POST['bank_num'];
    $method_of_payment = $_POST["method_of_payment"];
    $auto_withdrawal = $_POST["auto_withdrawal"];
    $date_of_payment = $_POST["date_of_payment"];
    $id = 200;

    $bank_num_err = $date_err = " ";

    if (empty($bank_num)){
        $bank_num_err = "Please Enter Valid Bank Account.";
    }
    if (empty($date_of_payment)){
        $date_err = "Please Enter Valid Date.";
    }
    $sql = "INSERT INTO m_Payment (bank_number,method_of_payment,auto_withdrawal,date_of_payment,id) VALUES ('$bank_num', '$method_of_payment','$auto_withdrawal','$date_of_payment','$id');";

    if(mysqli_query($link, $sql)){

        echo "New record created successfully";
    }
    else{
        echo "Error:".$sql."<br>".mysqli_error($link);
    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <<meta name="viewport" content="width=device-width", initial-scale=1, shrink-to-fit=no">
        <!-- Scripts for Bootstrap-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Employer Home</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top">
            <a class="navbar-brand" href="">Job Seeker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="Employee.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Jobs.html">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Profile.html">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Membership.html">Membership</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contact.html">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div style="margin: 40px 50px; padding: 50px 50px;" class="row">

                <div class="col">
                    <h1>Prime Membership</h1>
                    <p>Apply up to 5 jobs<br><em>$10/month</em></p>
                    <br/>
                    <h1>Gold Membership</h1>
                    <p>Unlimited job applying<br><em>$20/month</em></p>
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
                                <select class="form-control" name="Membership">
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
                            <label>Method of Withdraw:</label>
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
        </div>

    </body>
</html>