<?php ob_start(); ?> 
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<?php 
    $username = "";
    if (isset($_POST['submit']))
    {
        // validation
        $required_fields = array("username", "password");
        validate_presences($required_fields);
        
        if (empty($errors))
        {
            // Attemp login
            $username = $_POST["username"];
            $password = $_POST["password"];
            $found_admin = attemp_login($username, $password);

            if ($found_admin) 
            {
                //success
                //mark user as logged in
                $_SESSION["admin_id"] = $found_admin["id"];
                $_SESSION["username"] = $found_admin["username"];
                redirect_to("admin.php");
               
            } else 
                {
                // Failure
                $_SESSION['message'] = "Username/password not found";
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
            <h2>Login</h2>
                
            <form action="login.php" method="POST">
                <p>
                    Username : 
                    <input type="text" name="username" value="<?php echo htmlentities($username);?>" />
                </p>
                <p>
                    Password : 
                    <input type="password" name="password" value=""   />
                </p>
                <input type="submit" name="submit" value="submit" />
            </form>
            <br />
            <a href="manage_admins.php">Cancel</a>
        </div>
    </div>

<?php include("../includes/layouts/footer.php"); ?>