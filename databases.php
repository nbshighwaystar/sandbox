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
    //2. Perform database query
    $query  = "SELECT * ";
    $query .= "FROM subjects ";
    $query .= "WHERE visible = 1 ";
    $query .= "ORDER BY id ASC";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Database query failed.");
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Database</title>
    </head>
    <body>
    <ul>
        <?php
            //3. returned data (if any)
            while ($subject=mysqli_fetch_array($result)) {
            //output data from each subject...
            ?>        
                <li><?php echo $subject['menu_name'] . " " . $subject['id']; ?></li>
                <!--
                echo $subject['id'] . "<br />";
                echo $subject['position'] . "<br />";
                echo $subject['visible'] . "<br />";
                echo "<hr />";
                -->
        <?php
            }
        ?>
    </ul>
        <?php
            //4. Release returned data
            mysqli_free_result($result);
        ?>
    </body>
<?php
    //5. Close database connection
    if(isset($connection)){
        mysqli_close($connection);
        unset($connection);
    }
?>
</html>