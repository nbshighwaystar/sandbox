<?php
    function confirm_query( $result_set)
    {   
        # code...
        if (!$result_set){
            die("Databaes query failed.");
        }
    }

    function find_all_subjects()
    {
        global $connection;
        $query  = "SELECT * ";
        $query .= "FROM subjects ";
        $query .= "WHERE visible = 1 ";
        $query .= "ORDER BY id ASC";
        $subjet_set = mysqli_query($connection, $query);
        confirm_query($subjet_set);
        return $subjet_set; 
    }

    function find_pages_for_subject($subject_id)
    {
        global $connection;
        $query  = "SELECT * ";
        $query .= "FROM pages ";
        $query .= "WHERE visible = 1 ";
        $query .= "AND subject_id = {$subject_id} ";
        $query .= "ORDER BY position ASC";
        $page_set = mysqli_query($connection, $query);
        confirm_query($page_set);
        return $page_set;
    }
?> 