<?php
// Include config file
require_once "config.php";

$first_N_err = $last_N_err = $email_err = "";
$education_err = $experience_err = "";

$first_name = $last_name = $email = $experience ="";
$education = "";
if(isset($_POST['Edit_Name'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST["last_name"];

    /// ID need to change to session ID 
    $id = 100;

    if (empty($first_name)){
        $first_N_err = "Please Enter First Name.";
    }
    if (empty($last_name)){
        $last_N_err = "Please Enter Last Name.";
    }
    $sql = "UPDATE m_Job_seeker SET first_name = '$first_name',last_name = '$last_name' WHERE id = '$id'";

    if(mysqli_query($link, $sql)){
        echo "New record created successfully";
    }
    else{
        echo "Error:".$sql."<br>".mysqli_error($link);
    }
    mysqli_close($link);
}

if(isset($_POST['Edit_Email'])){

    $email= $_POST['email'];
 
    /// ID need to change to session ID 
    $id = 100;

    if (empty($email)){
        $email_err = "Please Enter Valid E-mail.";
    }

    $sql = "UPDATE User SET email = '$email' WHERE id = '$id'";

    if(mysqli_query($link, $sql)){
        echo "New record created successfully";
    }
    else{
        echo "Error:".$sql."<br>".mysqli_error($link);
    }
    mysqli_close($link);
}

if(isset($_POST['Edit_Experience'])){

    $experience = $_POST['experience'];

    /// ID need to change to session ID 
    $id = 100;

    if (empty($experience)){
        $experience_err = "Please Enter Valid Input.";
    }
  
    $sql = "UPDATE m_Job_seeker SET work_experience = '$experience'  WHERE id = '$id'";

    if(mysqli_query($link, $sql)){
        echo "New record created successfully";
    }
    else{
        echo "Error:".$sql."<br>".mysqli_error($link);
    }
    mysqli_close($link);
}

if(isset($_POST['Edit_Education'])){

    $education = $_POST['education'];

    /// ID need to change to session ID 
    $id = 100;

    if (empty($education)){
        $education_err = "Please Enter Valid Input.";
    }

    $sql = "UPDATE m_Job_seeker SET education = '$education' WHERE id = '$id'";

    if(mysqli_query($link, $sql)){
        echo "New record created successfully";
    }
    else{
        echo "Error:".$sql."<br>".mysqli_error($link);
    }
    mysqli_close($link);
}

if(isset($_POST['Edit_Payment'])){

    $method_of_payment = $_POST['method_of_payment'];
    $auto_withdrawal = $_POST["auto_withdrawal"];

    /// ID need to change to session ID 
    $id = 100;

    $sql = "UPDATE User SET method_of_payment = '$method_of_payment',auto_withdrawal = '$auto_withdrawal' WHERE id = '$id'";

    if(mysqli_query($link, $sql)){
        echo "New record created successfully";
    }
    else{
        echo "Error:".$sql."<br>".mysqli_error($link);
    }
    mysqli_close($link);
}

if(isset($_POST['Edit_Membership'])){

    $membership= $_POST['membership'];

    /// ID need to change to session ID 
    $id = 100;

    $sql = "UPDATE User SET membership = '$membership' WHERE id = '$id'";

    if(mysqli_query($link, $sql)){
        echo "New record created successfully";
    }
    else{
        echo "Error:".$sql."<br>".mysqli_error($link);
    }
    mysqli_close($link);
}

if(isset($_POST['Delete'])){

    $sql = "DELETE FROM User WHERE id ='$id'";

    if(mysqli_query($link, $sql)){
        echo "Delete successfully.";
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
        <meta name="viewport" content="width=device-width", initial-scale=1, shrink-to-fit=no">
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

        <div style="margin: 40px 250px; padding: 50px 50px;">

            <h2>Edit Profit</h2><br>

            <form form action= " " method = "POST" >
                <div class="form-group <?php echo (!empty($first_N_err)) ? 'has-error': ''; ?>">
                  <label>First Name:</label>
                    <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
                    <span class="help-block"><?php echo $first_N_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($last_N_err)) ? 'has-error': ''; ?>">
                  <label>Last Name:</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
                    <span class="help-block"><?php echo $last_N_err; ?></span>
                </div>
                <button type="submit" class="btn btn-primary" name="Edit_Name"> Modify </button>
            </form>

            <form form action= " " method = "POST" >
                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error': ''; ?>">
                  <label>E-mail:</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                    <span class="help-block"><?php echo $email_err; ?></span>
                </div>
                <button type="submit" class="btn btn-primary" name="Edit_Email"> Modify </button>
            </form>

            <form form action= " " method = "POST" >
                <div class="form-group <?php echo (!empty($experience_err)) ? 'has-error': ''; ?>">
                  <label>Experience:</label>
                    <input type="text" name="experience" class="form-control" value="<?php echo $experience; ?>">
                    <span class="help-block"><?php echo $experience_err; ?></span>
                </div>
                <button type="submit" class="btn btn-primary" name="Edit_Experience"> Modify </button>
            </form> 

            <form form action= " " method = "POST" >
                <div class="form-group <?php echo (!empty($education_err)) ? 'has-error': ''; ?>">
                  <label>Education:</label>
                    <input type="text" name="education" class="form-control" value="<?php echo $education; ?>">
                    <span class="help-block"><?php echo $education_err; ?></span>
                </div>
                <button type="submit" class="btn btn-primary" name="Edit_Education"> Modify </button>
            </form>

            <h2>Modify Payment</h2><br>

            <form form action= " " method = "POST">
                  <label>Method of Payment:</label>
                    <select class="form-control" name="method_of_payment">
                      <option value="CreditCard">Credit Card</option>
                      <option value="CheckingAcc">Checking Account</option>              
                    </select>                         
                     
                    <label>Method of Withdraw:</label>
                      <select class="form-control" name="auto_withdrawal">
                        <option value="auto">Auto</option>
                        <option value="manual">Manual</option>
                      </select>
                  <button type="submit" class="btn btn-primary" name="Edit_Payment"> Modify </button>                   
            </form>

            <h2>Modify Membership</h2><br>

            <form form action= " " method = "POST">
              <input type="radio" id="basic" name="membership" value="basic">
              <label for="basic">Basic Membership</label><br>
              <button type="submit" class="btn btn-primary" name="Edit_Membership"> Modify </button>
            </form>
            <br>
            <form form action= " " method = "POST">
                <button class="btn btn-primary" type="submit" name="Delete">Delete Profile</button>
            </form>
        </div>

    </body>
</html>