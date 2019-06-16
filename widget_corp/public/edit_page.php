<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>


<?php find_selected_page(); ?>

<?php
    if (!$current_page)
    {
        // subject ID was missing or invalid or
        // subject couldn't be found in database
        redirect_to("manage_content.php");
    }
?>

<?php
    if (isset($_POST['submit'])) 
    {
        // Process the form
        
        $id = $current_page["id"];
        $menu_name = mysql_prep($_POST["menu_name"]);
        $position = (int) $_POST["position"];
        $visible = (int) $_POST["visible"];
        $content = mysql_prep($_POST["content"]);
        
        // validation
        $required_fields = array("menu_name", "position", "visible", "content");
        validate_presences($required_fields);
        
        $fields_with_max_lengths = array("menu_name" => 30);
        validate_max_lengths($fields_with_max_lengths);
        
        if (empty($errors))
        {
            // Perform Update
        
            $query  = "UPDATE pages SET ";
            $query .= "menu_name = '{$menu_name}', ";
            $query .= "position = {$position}, ";
            $query .= "visible = {$visible}, ";
            $query .= "content = '{$content}' ";
            $query .= "WHERE id = {$id} ";
            $query .= "LIMIT 1"; 
           
            $result = mysqli_query($connection, $query);
            if ($result) 
            {
                //success
                $_SESSION["message"] = "Page updated.";
                redirect_to("manage_content.php?page={$id}");
                ob_flush();
            } else 
                {
                // Failure
                $message = "Page update failed";
                }
        }
    } else 
        {
            // This is probably a GET request
        
        }
    
?>


<?php include("../includes/layouts/header.php"); ?>

    <div id="main">
        <div id="navigation">
       
        <?php echo navigation($current_subject, $current_page); ?>
        

        </div>
            <div id="page">
                <?php  //$message is just a variable, doesn't use the session
                     if (!empty($message))
                     {
                         echo "<div class=\"message\">" . $message . "</div>";
                     } 
                     ?>
                <?php echo form_errors($errors); ?>

                <h2>Edit Page: <?php echo $current_page["subject_id"]; ?></h2>

                <form action="edit_page.php?page=<?php echo $current_page["id"] ?>" method="POST">
                    <p>
                        Menu name: 
                        <input type="text" name="menu_name" value="<?php echo urldecode($current_page["menu_name"]) ?>" />
                    </p>
                    <p>
                        Position: 
                        <select name="position">
                        <?php 
                            $page_set = find_pages_for_subject($current_page["subject_id"]);
                            $page_count = mysqli_num_rows($page_set);
                            for ($count=1; $count <= $page_count ; $count++) { 
                                echo "<option value=\"{$count}\"";
                                if ($current_page["position"] == $count) {
                                    echo " selected";
                                }
                                echo ">{$count}</option>";
                            }
                        ?>
                        </select>
                    </p>
                    <p>
                        Visible: 
                        <input type="radio" name="visible" value="0" <?php if ($current_page["visible"] == 0) { echo "checked";} ?> /> No
                        &nbsp;
                        <input type="radio" name="visible" value="1" <?php if ($current_page["visible"] == 1) { echo "checked";} ?>/> Yes
                    </p>
                    <p>
                            Content: <br />
                            <textarea name="content"  cols="50" rows="10" > 
                                <?php
                                    echo htmlentities($current_page["content"]); 
                                ?>
                            </textarea>
                           
                        </p>
                
                    <input type="submit" name="submit" value="Edit Page" />
                </form>
                <br />
                <a href="manage_content.php">Cancel</a>
                &nbsp;
                &nbsp;
                <a href="delete_page.php?page=<?php echo $current_page["id"] ?>" onclick="return confirm('Are you sure?');">Delete Page</a>
            </div>
            
    </div>

<?php include("../includes/layouts/footer.php"); ?>