<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<?php
    find_selected_page();
?>
<?php 
    // Cant add a new page unless we have a subject as a parent
    if (!$current_subject)
    {
        // subject ID was missing or invalid or 
        // subject couldn't be found in database
        redirect_to("manage_content.php");
    }
?>
<?php
    if (isset($_POST['submit'])) 
    {
        // validation
        $required_fields = array("menu_name", "position", "visible", "content");
        validate_presences($required_fields);
     
        $fields_with_max_lengths = array("menu_name" => 30);
        validate_max_lengths($fields_with_max_lengths);
        
        
        if (empty($errors))
        {
            $id = $current_subject["id"];
            $menu_name = $_POST['menu_name'];
            $position = $_POST['position'];
            $visible = $_POST['visible'];
            $content = $_POST['content'];
            $menu_name = mysql_prep($menu_name);
            $content = mysql_prep($content);
            // Perform Create page
        
            $query  = "INSERT INTO pages (";
            $query .= "subject_id, menu_name, position, visible, content"; 
            $query .= ") VALUES (";
            $query .= " '{$id}', '{$menu_name}', {$position}, {$visible}, '{$content}'";
            $query .= ")";
               
            $result = mysqli_query($connection, $query);
            if ($result) 
            {
                //success
                $_SESSION["message"] = "Page created.";
                redirect_to("manage_content.php");
                ob_flush();
            } else 
                {
                // Failure
                $message = "Page creation failed";
                }
        }
    } else 
        {
            // This is probably a GET request
           //redirect_to("manage_content.php");
        
        }
    
?>
    <div id="main">
        <div id="navigation">
       
        <?php echo navigation($current_subject, $current_page); ?>
        
        </div>
            <div id="page">
             <?php
                if (!empty($message))
                {
                    echo "<div class=\"message\">" . $message . "</div>";
                }
             ?>
                <?php echo form_errors($errors); ?>
                <h2>Create Page for : <?php echo $current_subject["menu_name"] ?></h2>

                <form action="new_page.php?subject=<?php echo $current_subject["id"]?>" method="POST">
                    <p>
                        Menu name: 
                        
                        <input type="text" name="menu_name" value=""  />
                     
                    </p>
                    <p>
                        Position:
                        <select name="position">
                            <?php  
                                
                                $page_set = find_pages_for_subject($current_subject["id"]);
                                $page_count = mysqli_num_rows($page_set);
                                for ($count=1; $count <= $page_count + 1; $count++) { 
                                    echo "<option value=\"{$count}\">{$count}</option>";
                                }
                            ?>
                        </select>
                    </p>
                    <p>
                        Visible: 
                        <input type="radio" name="visible" value="0" <?php if ($current_page["visible"] == 0) {echo "checked";} ?> /> No
                        &nbsp;
                        <input type="radio" name="visible" value="1" <?php if ($current_page["visible"] == 1) {echo "checked";} ?>/> Yes
                        &nbsp;
                        <p>
                            Content: <br />
                            <textarea name="content" placeholder="Enter contents here..." cols="30" rows="10"> </textarea>
                           
                        </p>
                    </p>
                    <input type="submit" name="submit" value="Create Page" />
                </form>
                <br />
                <a href="manage_content.php?subject=<?php echo urldecode($current_subject["id"]); ?>">Cancel</a>
            </div>
    </div>

<?php include("../includes/layouts/footer.php"); ?>