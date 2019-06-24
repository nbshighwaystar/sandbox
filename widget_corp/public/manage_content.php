<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>

<?php $layout_context = "admin"; ?>
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
                     <br />

                     <a href="edit_subject.php?subject=<?php echo 
                     $current_subject["id"]; ?>">Edit Subject</a><br />
                     <br />

                     <hr>
                     <h3>Pages in this subject: <?php echo $current_subject["menu_name"]?> </h3>

                     <?php 
                        $page_set = find_pages_for_subject($current_subject["id"]);
                        echo "<ul class=\"pages\">";
                        while ($page = mysqli_fetch_assoc($page_set))
                        {?>
                            <li>
                                <?php $safe_page_id = urldecode($page["id"])?>
                            <a href="manage_content.php?page=<?php echo $safe_page_id?>">
                                <?php echo htmlentities($page['menu_name']); ?></a>
                            </li>
                            
                        <?php } mysqli_free_result($page_set); ?>
                        </ul>
                        <br />
                        <br />
                         + <a href="new_page.php?subject=<?php echo urldecode($current_subject["id"]); ?>">Add a new page in this subject </a>
                    
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
                     <br />
                     <br />

                     <a href="edit_page.php?page=<?php echo 
                     urldecode($current_page["id"]); ?>">Edit Page</a><br />
                     <br />
                     
                <?php } else 
                { ?>
                    <h2>Please select a subject or a page.</h2>
                <?php } ?>

            </div>
    </div>

<?php include("../includes/layouts/footer.php"); ?>