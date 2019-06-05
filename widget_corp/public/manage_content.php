<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<?php
    find_selected_page();
?>
    <div id="main">
        <div id="navigation">
            <br />
            <a href="admin.php">&laquo Main menu</a>
        <?php echo navigation($current_subject, $current_page); ?>
        <br />
        <a href="new_subject.php">+ Add a subject </a>
        <br />
        <br />
        </div>
            <div id="page">
                <?php echo message();?>
               <?php 
                if ($current_subject)
                { ?>
                <h2>Manage Subject</h2>
                     Menu name: <?php echo 
                     htmlentities($current_subject["menu_name"]); ?> <br />
                     Position: <?php echo $current_subject["position"]?> <br />
                     Visible: <?php echo $current_subject["visible"] == 1 ? 'Yes' : 'no'; ?> 
                     <br />

                     <a href="edit_subject.php?subject=<?php echo 
                     $current_subject["id"]; ?>">Edit Subject</a>
                
                <?php } elseif ($current_page)
                { ?><br />
                    <h2>Manage Page</h2>
                    Menu name: <?php echo 
                    htmlentities($current_page{"menu_name"}); ?> <br />
                                         Position: <?php echo $current_page["position"]?> <br />
                     Visible: <?php echo $current_page["visible"] == 1 ? 'Yes' : 'no'; ?> 
                     <br />
                     Content:<br />
                     <div class="view-content">
                        <?php echo htmlentities($current_page["content"]); ?>
                     </div>

                <?php } else 
                { ?>
                    <h2>Please select a subject or a page.</h2>
                <?php } ?>

            </div>
    </div>

<?php include("../includes/layouts/footer.php"); ?>