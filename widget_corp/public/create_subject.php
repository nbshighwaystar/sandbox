<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/function.php"); ?>
<?php
    if (isset($_POST['submit'])) {
        $menu_name = $_POST['menu_name'];
        $position = (int) $_POST['position'];
        $visible = (int) $_POST['visible'];

        $menu_name = mysql_prep($menu_name);
        
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
