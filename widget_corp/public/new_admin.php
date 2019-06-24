<?php ob_start(); ?> 
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<?php 
    if (isset($_POST['submit']))
    {
        $username = trim($_POST['username']);
        $hashed_password = trim($_POST['hashed_password']);
        // validation
        $required_fields = array("username", "hashed_password");
        validate_presences($required_fields);

        $fields_with_max_lengths = array("username" => 30);
        validate_max_lengths($fields_with_max_lengths);
        
        if (empty($errors))
        {
            // Perform Create admin
            $query  = "INSERT INTO admins (";
            $query .= " username, hashed_password"; 
            $query .= ") VALUES (";
            $query .= "'{$username}', '{$hashed_password}'";
            $query .= ")";
               
            $result = mysqli_query($connection, $query);
            if ($result) 
            {
                //success
                $_SESSION["message"] = "Admin created.";
                redirect_to("manage_admins.php");
                ob_flush();
            } else 
                {
                // Failure
                $message = "Admin creation failed";
                }
        }
    } else
    {
        
    }
  ?>
    <div id="main">
        <div id="navigation">
            <br />
            <a href="admin.php">&laquo Main menu</a>
        </div> <!-- /* navigation */ -->

        <div id="page">
            <?php 
            if(!empty($message))
            {
                echo "<div class=\"message\">" . $message . "</div>";
            }
            ?>
            <?php echo form_errors($errors);?>
            <h2>Create Admin</h2>
                
            <form action="new_admin.php" method="POST">
                <p>
                    Username : 
                    <input type="text" name="username" value="" />
                </p>
                <p>
                    Password : 
                    <input type="password" name="hashed_password" value=""   />
                </p>
                <input type="submit" name="submit" value="Create Admin" />
            </form>
            <br />
            <a href="manage_admins.php">Cancel</a>
        </div>
    </div>

<?php include("../includes/layouts/footer.php"); ?>