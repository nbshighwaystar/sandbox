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

    function navigation($subject_id, $page_id)
    {   
       
        $output = "<ul class=\"subjects\">";
        $subjet_set = find_all_subjects();
        while ($subject=mysqli_fetch_assoc($subjet_set)) 
        {
            $output .= "<li ";
                if ($subject_id == $subject['id']) 
                {
                    $output .=  "class=\"selected\"";
                }
            $output .= ">";
            $output .= "<a href=\"manage_content.php?subject=";
            $output .= urlencode($subject['id']);
            $output .= "\"> ";
            $output .= $subject['menu_name'];
            $output .="</a>";
            
            $page_set = find_pages_for_subject($subject['id']);
            $output .= "<ul class=pages>";
            while ($page = mysqli_fetch_assoc($page_set))
                    {
                        $output .= "<li ";
                            if ($page['id'] == $page_id)
                            {
                                $output .= "class =\"selected\"";
                            }
                        $output .= ">";
                        $output .= "<a href=\"manage_content.php?page=";
                        $output .= urlencode($page['id']);
                        $output .= "\"> ";
                        $output .= $page['menu_name'];
                        $output .= "</a></li>";
                    }

                $output .="</ul>";
                $output .= "</li>";
            }
            mysqli_free_result($page_set);
        $output .="</ul>";
        return $output;
        mysqli_free_result($subjet_set);
        
    }
?> 