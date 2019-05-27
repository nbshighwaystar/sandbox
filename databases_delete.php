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
    $id = 5;
    //2. Perform database query
    $query  = "DELETE FROM subjects ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";

    $result = mysqli_query($connection, $query);
    if ($result && mysqli_affected_rows($connection) == 1) {
        //success
        //redirect_to("somepage")
        echo "Success!";
    }else {
        // Failure
        // $message = "Subject delete failed";
        die("Database delete failed. " . mysqli_error($connection));
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Database Update</title>
    </head>
    <body>
    
    </body>
<?php
    //5. Close database connection
    mysqli_close($connection);
?>
</html>