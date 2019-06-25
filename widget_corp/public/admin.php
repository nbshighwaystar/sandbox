<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php confirm_logged_in(); ?>



<?php include("../includes/layouts/header.php");?>
<div id="main">
    <div id="navigation">
                &nbsp;
    </div>
        <div id="page">
            <h2>Admin Menu</h2>
            <p>Welcome to the admin area, <?php //echo htmlentities($_SESSION["username"]); ?></p>
            <ul>
                <li>
                    <a href="manage_content.php">Manage Website Content</a>
                </li>
                <li>
                    <a href="manage_admins.php">Manage Admin Users</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
                </ul>
        </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>