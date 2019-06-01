
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<?php
    if (isset($_GET["subject"]))
    {
        $selected_subject_id = $_GET["subject"];
        $selected_page_id = null;
    } elseif (isset($_GET["page"])) {
        $selected_page_id = $_GET["page"];
        $selected_subject_id = null;
    }else 
    {
        $selected_subject_id = null;
        $selected_page_id = null;
    }
?>
    <div id="main">
        <div id="navigation">
       
        <?php echo navigation($selected_subject_id, $selected_page_id); ?>
        
<a href="admin.php">Admin Page</a>
        </div>
            <div id="page">
                <h2>Manage Content</h2>
                <?php 
                if ($selected_subject_id)
                { ?>
                    <?php echo $selected_subject_id; ?>
                <?php } elseif ($selected_page_id)
                { ?>
                    <?php echo $selected_page_id; ?>
                <?php } else 
                { ?>
                    Please select a subject or a page.
                <?php } ?>

            </div>
    </div>

<?php include("../includes/layouts/footer.php"); ?>