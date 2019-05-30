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
        $query  = "SELECT * ";
        $query .= "FROM subjects ";
        $query .= "WHERE visible = 1 ";
        $query .= "ORDER BY id ASC";
        return $query; 
    }

    function find_page_by_id($subject)
    {
        $query  = "SELECT * ";
        $query .= "FROM pages ";
        $query .= "WHERE visible = 1 ";
        $query .= "AND subject_id = {$subject["id"]} ";
        $query .= "ORDER BY id ASC";
        return $query;
    }
?>