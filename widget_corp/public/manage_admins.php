<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<style>
table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #999;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: burlywood;
}
</style>

    <div id="main">
        <div id="navigation">
            <br />
            <a href="admin.php">&laquo Main menu</a>
        </div> <!-- /* navigation */ -->
            <div id="page">
                <?php echo message();?>
                <h2>Manage Admins</h2>
                <?php   
                    
                ?> <!-- find_all_admins -->
                <table>
                    <tr>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                        $admin_set= find_all_admins();
                    ?>
                        <?php
                        while ($admin = mysqli_fetch_assoc($admin_set)) { ?>
                    <tr>
                            <td>
                                <?php echo $admin["username"] ;?>
                            </td>
                            <td><a href="edit_admin.php?admin=<?php echo $admin["id"];?>">Edit</a> <a href="delete_admin.php?admin=<?php echo $admin["id"];?>">Delete</a></td>
                    </tr>
                        
                        <?php } // while
                        mysqli_free_result($admin_set);
                        ?>
                </table>
                <br>
                <br> 
                <a href="new_admin.php">+ Add new admin</a>
            </div> <!-- page -->
    </div> <!-- main -->


<?php include("../includes/layouts/footer.php"); ?>