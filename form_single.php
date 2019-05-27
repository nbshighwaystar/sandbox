<?php
require_once("included_functions.php");

if (isset($_POST['submit'])){    
    // form submitted
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "neil" && $password == "secret") {
        // successful login
        redirect_to("databases.php");
    }else{
        $message = "There were errors";
        
    }
}else {
    $message = "Please Login!";
    $username = "";

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Form: Single Page</title>
    </head>
    <body>
        <?php echo $message; ?><br />
        <form action="form_single.php" method="POST">
            Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username);?>" ><br />
            Password: <input type="password" name="password" value=""><br />
            <br/>
            <input type="submit" name="submit" value="submit">
        </form>

    </body>

</html>