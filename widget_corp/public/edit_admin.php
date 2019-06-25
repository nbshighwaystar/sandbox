<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>


<?php
    $current_admin = find_admin_by_id($_GET["admin"]);
    if (isset($_POST['submit']))
    {
       
        $id = $current_admin["id"];
        $username = trim($_POST['username']);
        $password = password_encrypt($_POST['password']);

        // validation
        $required_fields = array("username", "password");
        validate_presences($required_fields);

        $fields_with_max_lengths = array("username" => 30);
        validate_max_lengths($fields_with_max_lengths);

        if (empty($errors))
        {
            $query  ="UPDATE admins SET ";
            $query .="username = '{$username}', ";
            $query .="hashed_password = '{$password}' ";
            $query .="WHERE id = {$id} ";
            $query .="LIMIT 1";
            $result = mysqli_query($connection, $query);

            if ($result)
            {
                // success
                $_SESSION["message"] = "Admin updated.";
                redirect_to("manage_admins.php");
                ob_flush();
            } else
            {
                // failure
                $message = "Admin update failed.";
            }
        }


    } else
    {
    }
?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

    <div id="main">
        <div id="navigation">

        </div>
            <div id="page">
                <?php  //$message is just a variable, doesn't use the session
                     if (!empty($message))
                     {
                         echo "<div class=\"message\">" . $message . "</div>";
                     } 
                     ?>
                <?php echo form_errors($errors); ?>

                <h2>Edit admin: <?php echo htmlentities($current_admin["username"]); ?></h2>

                <form action="edit_admin.php?admin=<?php echo urlencode($current_admin["id"]);?>" method="POST">
                    <p>
                        Username: 
                        <input type="text" name="username" value="<?php echo htmlentities($current_admin["username"]); ?>" />
                    </p>
                    <p>
                        Password:
                        <input type="password" name="password" id="" value="">
                    </p>
                    <input type="submit" name="submit" value="Edit admin" />
                </form>
                <br />
                <a href="manage_admins.php">Cancel</a>
            </div>
    </div>

<?php include("../includes/layouts/footer.php"); ?>