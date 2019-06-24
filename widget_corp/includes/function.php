<?php
    function redirect_to($new_location)
    {
        
        header("Location: " . $new_location);
        exit;
    }

    function mysql_prep($string)
    {
        global $connection;
        $escaped_string = mysqli_real_escape_string($connection, $string);
        return $escaped_string;
    }
    
    function confirm_query( $result_set)
    {   
        # code...
        if (!$result_set){
            die("Databaes query failed.");
        }
    }
    
    function form_errors($errors = array()) 
    {
        $output = "";
        if (!empty($errors))
        {
            $output .= "<div class=\"error\">";
            $output .= "Please fix the following errors:";
            $output .= "<ul>";
            foreach ($errors as $key => $error) 
            {
                $output .= "<li>{$error}</li>";
            }
            $output .= "</ul>";
            $output .= "</div>";
        } 
        return $output;
    } 
      
    function find_all_subjects($public = true)
    {
        global $connection;
        $query  = "SELECT * ";
        $query .= "FROM subjects ";
        if ($public)
        {
            $query .= "WHERE visible = 1 ";
        }
        $query .= "ORDER BY position ASC";
        $subject_set = mysqli_query($connection, $query);
        confirm_query($subject_set);
        return $subject_set; 
    }

    function find_pages_for_subject($subject_id, $public = true)
    {
        global $connection;
        $safe_subject_id = mysqli_real_escape_string($connection,$subject_id);

        $query  = "SELECT * ";
        $query .= "FROM pages ";
        $query .= "WHERE subject_id = {$safe_subject_id} ";
        if ($public)
        {
            $query .= "AND visible = 1 ";
        }
        $query .= "ORDER BY position ASC";
        $page_set = mysqli_query($connection, $query);
        confirm_query($page_set);
        return $page_set;
    }

    function find_subject_by_id($subject_id, $public = true)
    {
        global $connection;
        $safe_subject_id = mysqli_real_escape_string($connection, $subject_id);
        $query  = "SELECT * ";
        $query .= " FROM subjects ";
        $query .= " WHERE id = {$safe_subject_id} ";
        if ($public)
        {
            $query .= "AND visible = 1 ";
        }
        $query .= " LIMIT  1";
        $subject_set = mysqli_query($connection, $query);
        confirm_query($subject_set);
        if($subject = mysqli_fetch_assoc($subject_set))
        {
            return $subject; 
        } else 
        {
            return null;
        }
    }

    function find_page_by_id($page_id, $public=true) 
    {
       global $connection;

       $safe_page_id = mysqli_real_escape_string($connection, $page_id);
       $query  = "SELECT * ";
        $query .= "FROM pages ";
        $query .= "WHERE id = {$safe_page_id} ";
        if ($public)
        {
            $query .= "AND visible = 1 ";
        }
        $query .= "LIMIT  1";
        $page_set = mysqli_query($connection, $query);
        confirm_query($page_set);
        if($page = mysqli_fetch_assoc($page_set))
        {
            return $page; 
        } else 
        {
            return null;
        }
    }

    function find_default_page_for_subject($subject_id)
    {
        $page_set = find_pages_for_subject($subject_id);
        if($first_page = mysqli_fetch_assoc($page_set))
        {
            return $first_page; 
        } else 
        {
            return null;
        }

    }

    function find_selected_page($public=false)
    {
        global $current_subject;
        global $current_page;
        if (isset($_GET["subject"]))
        {
            $current_subject = find_subject_by_id($_GET["subject"], $public);
            if ($current_subject && $public)
            {
                $current_page = find_default_page_for_subject($current_subject["id"]);
            } else  
            {
                $current_page = null;
            }
        } elseif (isset($_GET["page"])) 
        {
            $current_page = find_page_by_id($_GET["page"], $public);
            $current_subject = null;
        }else 
        {
            $current_page = null;
            $current_subject = null;
        }
    
    }

    function navigation($subject_array, $page_array)
    {   
       
        $output = "<ul class=\"subjects\">";
            $subject_set = find_all_subjects(false);
        
        while ($subject=mysqli_fetch_assoc($subject_set)) 
        {
            $output .= "<li ";
                if ($subject_array && $subject_array["id"] == $subject['id']) 
                {
                    $output .=  "class=\"selected\"";
                }
            $output .= ">";
            $output .= "<a href=\"manage_content.php?subject=";
            $output .= urlencode($subject['id']);
            $output .= "\"> ";
            $output .= $subject['menu_name'];
            $output .="</a>";
        
            
            $page_set = find_pages_for_subject($subject['id'], false);
                
                $output .= "<ul class=pages>";
                while ($page = mysqli_fetch_assoc($page_set))
                {
                        $output .= "<li ";
                            if ($page_array && $page['id'] == $page_array["id"])
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
                mysqli_free_result($page_set);
            
            $output .= "</li>";
        }
        $output .="</ul>";
        return $output;
        mysqli_free_result($subject_set);
        
    }

    function public_navigation($subject_array, $page_array)
    {   
       
        $output = "<ul class=\"subjects\">";
        $subject_set = find_all_subjects();
        while ($subject=mysqli_fetch_assoc($subject_set)) 
        {
            $output .= "<li ";
                if ($subject_array && $subject_array["id"] == $subject['id']) 
                {
                    $output .=  "class=\"selected\"";
                }
            $output .= ">";
            $output .= "<a href=\"index.php?subject=";
            $output .= urlencode($subject['id']);
            $output .= "\"> ";
            $output .= htmlentities($subject['menu_name']);
            $output .="</a>";
            
            if ($subject_array["id"] == $subject["id"] || $page_array["subject_id"] == $subject["id"]) 
            {
                $page_set = find_pages_for_subject($subject["id"]);
                $output .= "<ul class=pages>";
                while ($page = mysqli_fetch_assoc($page_set))
                        {
                            $output .= "<li ";
                                if ($page_array && $page['id'] == $page_array["id"])
                                {
                                    $output .= "class =\"selected\"";
                                }
                            $output .= ">";
                            $output .= "<a href=\"index.php?page=";
                            $output .= urlencode($page['id']);
                            $output .= "\"> ";
                            $output .= $page['menu_name'];
                            $output .= "</a></li>";
                        }

                    mysqli_free_result($page_set);
                    $output .="</ul>";
            }
            $output .= "</li>";
        }
        $output .="</ul>";
        return $output;
        mysqli_free_result($subject_set);
        
    }

    function find_all_admins()
    {   
        global $connection;
        $query  = "SELECT * ";
        $query .= "FROM admins ";
        $query .= "ORDER BY username ASC";
        $admin_set = mysqli_query($connection, $query);
        confirm_query($admin_set);
        return $admin_set; 
    } /*<!-- find_all_admins --> */

    function find_admin_by_id($admin_id)
    {
        global $connection;

       $safe_admin_id = mysqli_real_escape_string($connection, $admin_id);
       $query  = "SELECT * ";
        $query .= "FROM admins ";
        $query .= "WHERE id = {$safe_admin_id} ";
        $query .= "LIMIT  1";
        $admin_set = mysqli_query($connection, $query);
        confirm_query($admin_set);
        if($admin = mysqli_fetch_assoc($admin_set))
        {
            return $admin; 
        } else 
        {
            return null;
        }
    }

?> 