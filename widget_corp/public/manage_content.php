
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
    <div id="main">
        <div id="navigation">
        <ul class="subjects">

        <?php 
            
            $subject_set = mysqli_query($connection, find_all_subjects());
            confirm_query($subject_set);
        ?>
        <?php
            while ($subject=mysqli_fetch_assoc($subject_set)) {
                ?>        
                <li><?php echo $subject['menu_name']; ?>
                <?php 
                        
                        $page_set = mysqli_query($connection, find_all_pages());
                        confirm_query($page_set);
                        ?>
                        
                    <ul class=pages>
                    <?php
                        while ($page=mysqli_fetch_assoc($page_set)) {
                           ?>
                            <li><?php echo $page['menu_name']; ?></li>
                        <?php } ?>
                    <?php mysqli_free_result($page_set); ?>
                    </ul>  
                    </li>
        <?php }  ?>
        </ul>
        <?php 
            //4. Release returned data
            mysqli_free_result($subject_set);
        ?>

        </div>
            <div id="page">
                <h2>Manage Content</h2>
            </div>
    </div>

<?php include("../inlcudes/layouts/footer.php"); ?>