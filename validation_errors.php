<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validation Errors</title>
</head>
<body>
    <?php
    require_once('validation_function.php');

    $errors = array();

    //$username = trim($_POST["username"]);
    $username = trim("Kevin");
    if (!has_presence($username)){
        $errors['username'] = "Username can't be blank";
    }
    
    //    if(array_key_exists($errors, "name")){
    //        echo "<span class=\"error-field\">&lt;&lt;</span>";
    //    }
    ?>
       <?php echo form_errors($errors); ?>
</body>
</html>
<!-- 
    Common Validations
    Presence
        String length
        min
        max   
        Type
        Inclusion in a set
        Uniqueness
        Format    
    -->