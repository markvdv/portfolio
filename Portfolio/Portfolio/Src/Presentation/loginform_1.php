<!doctype html>
<html>
    <head>
        <title>login</title>
    </head>
    <body>
        <?php 
        if(isset($error)){
            switch ($error){
                case "user_not_found":
                     echo "<p>user not found</p>";
                    break;
                case "incorrect_password":
                     echo "<p>incorrect password</p>";
                    break;
            }
           
        }
        ?>
        <form action="usercontroller.php" method="POST">
            <label for="name">
                username
                <input name="username" type="text" placeholder="username"> 
            </label>
            <label for="password">
                password 
                <input name="password" type="password" placeholder="password"> 
            </label>
            <input type="submit" placeholder="submit" name="submit">
        </form>
        <a href="register.php?action=register">register</a>
        <a href="usercontroller.php?action=guest">continue as guest</a>
    </body>
</html>
