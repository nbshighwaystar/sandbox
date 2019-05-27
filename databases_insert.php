<?php
    //1. Create a database connection
    $dbhost = "localhost";
    $dbuser = "widget_cms";
    $dbpass = "secretpassword";
    $dbname = "widget_corp";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    // Test connection occured.
    if(mysqli_connect_errno()) {
        die("Database connection failed: " 
        . mysqli_connect_error() . 
        " (" . mysqli_connect_errno() . ")"
    );
    }
?>
<?php
    // often these are form values in $_POST
    $menu_name = "Today's Widget Trivia";
    $position = 4;
    $visible = 1;

    $menu_name = mysqli_escape_string($connection, $menu_name);
    //2. Perform database query
    $query  = "INSERT INTO subjects (";
    $query .= " menu_name, position, visible"; 
    $query .= ") VALUES (";
    $query .= " '{$menu_name}', {$position}, {$visible}";
    $query .= ")";

    $result = mysqli_query($connection, $query);
    if ($result) {
        //success
        //redirect_to("somepage")
        echo "Success!";
    }else {
        // Failure
        // $message = "Subject creation failed";
        die("Database query failed. " . mysqli_error($connection));
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Database</title>
    </head>
    <body>
    
    </body>
<?php
    //5. Close database connection
    mysqli_close($connection);
?>
</html>