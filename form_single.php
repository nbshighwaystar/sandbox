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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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