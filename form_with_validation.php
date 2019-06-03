<?php
require_once("included_functions.php");
require_once("validation_function.php");

$errors = array();
$message = "";
if (isset($_POST['submit'])){    
    // form submitted
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validation
    $fields_requied = array("username", "password");
    foreach ($fields_requied as $field) 
    {
        $value = trim($_POST[$field]);
        if (!has_presence($value))
        {
            $errors[$field] = ucfirst($field) ." can't be blank";
        }
    }
    $fields_with_max_lengths = array("username" => 30, "password" => 8);
    validate_max_lengths($fields_with_max_lengths);
    
    if (empty($errors))
    {
        // try to login
        if ($username == "neil" && $password == "secret") 
        {
            // successful login
            redirect_to("basic.php");
        } else 
        {
            $message = "Username/password do not match.";
        }
    } 
} else 
{
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
    <title>Form with Validation</title>
</head>
<body>
        <?php echo $message; ?><br />
        <?php echo form_errors($errors); ?>

        <form action="form_with_validation.php" method="POST">
            Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username);?>" ><br />
            Password: <input type="password" name="password" value=""><br />
            <br/>
            <input type="submit" name="submit" value="submit">
        </form>
    
</body>
</html>