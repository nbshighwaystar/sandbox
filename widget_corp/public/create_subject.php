<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/function.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
    if (isset($_POST['submit'])) {
        $menu_name = $_POST['menu_name'];
        $position = (int) $_POST['position'];
        $visible = (int) $_POST['visible'];

        $menu_name = mysql_prep($menu_name);

        // validation
        $required_fields = array("menu_name", "position", "visible");
        validate_presences($required_fields);

        $fields_with_max_lengths = array("menu_name" => 30);
        validate_max_lengths($fields_with_max_lengths);

        if (!empty($errors))
        {
            $_SESSION["errors"] = $errors;
            redirect_to("new_subject.php");
        }
        
        $query  = "INSERT INTO subjects (";
        $query .= " menu_name, position, visible"; 
        $query .= ") VALUES (";
        $query .= " '{$menu_name}', {$position}, {$visible}";
        $query .= ")";

        $result = mysqli_query($connection, $query);
        if ($result) {
        //success
        $_SESSION["message"] = "Subject created";
        redirect_to("manage_content.php");
        }else {
        // Failure
        $_SESSION["message"] = "Subject creation failed";
        redirect_to("new_subject.php");
    }
    }else {
        
        redirect_to("new_subject.php");
    }
    ob_flush();
?>



<?php
?>


<?php
    if (isset($connection)) { mysqli_close($connection);} ?>
