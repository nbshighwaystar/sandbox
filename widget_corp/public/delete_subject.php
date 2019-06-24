<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>


<?php
    $current_subject = find_subject_by_id($_GET["subject"], false);
    if (!$current_subject)
    {
        // subject ID was missing or invalid or
        // subject couldn't be found in database
        redirect_to("manage_content.php");
    }

    $page_set = find_pages_for_subject($current_subject["id"]);
    if (mysqli_num_rows($page_set) > 0)
    {
        $_SESSION["message"] = "Can't delete a subject with page(s).";
        redirect_to("manage_content.php?subject={$current_subject["id"]}");
    }

    $id = $current_subject["id"];
    $query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) 
    {
        //success
        $_SESSION["message"] = "Subject deleted.";
        redirect_to("manage_content.php");
        ob_flush();
    } else 
        {
        // Failure
        $_SESSION["message"] = "Subject deletion failed.";
        redirect_to("manage_content.php?subject={$id}");
        }?>