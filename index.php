<?php 
// echo md5("1234");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>LOGIN PAGE</title>
</head>
<body>

    
    <form action="db_login.php" method="post">
    <h2>Login Here</h2>

    <?php
            if(@$_GET['error'] == true){
                ?>
                 <p class="error"><?php echo $_GET['error']; ?></p>
                <?php
            }
        ?>

<?php
            if(@$_GET['invalid'] == true){
                ?>
                 <p class="error"><?php echo $_GET['invalid']; ?></p>
                <?php
            }
        ?>
   

    <label for="">Username</label>
    <input type="text" name="uname" placeholder="Enter Username"><br>
    
    
    <label for="">Password</label>
    <input type="password" name="password" placeholder="Enter Password"><br>

    <button type="submit" name="login">Login</button>
    <!-- <p>Login as <a href="teacherlogin.php">Teacher</a></p> -->
</form>
</body>
</html>