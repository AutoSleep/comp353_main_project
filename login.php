<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include 'template/headtag.php'; 
    ?>
    <title>Signup</title>
</head>
<body class="text-center">
    <?php 
    include 'template/navbar.php'; 
    ?>
    
    <main class = "text-center">
        <form class="form-signin" action="">
            <img src="img/logo.png" alt="logo" width="100" height="100">
            <h1 class="h3 mb-3 font-weight-normal"> LogIn</h1>
            <label for="inputemail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputpwd" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>


        </form>
    </main>
    <a href="employer/login.php">local</a>
    <a href="admin/dashboard.php">admin</a>


    <?php 
    include 'template/footer.php'; 
    ?>
</body>
</html>