<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Functions: Return Multiple Values</title>
    </head>
    <body>
        <?php
            function add_subt($value1, $value2)
            {
                $add = $value1 + $value2;
                $subt = $value1 - $value2;
                return array($add, $subt); 
            }

            $result_array = add_subt(10,5);
            echo "Add: " . $result_array[0] . "<br />";
            echo "Subt: " . $result_array[1] . "<br />";
            
            list($add_result, $subt_result) =  add_subt(20,7);
            echo "Add: " . $add_result . "<br />";
            echo "Subt: " . $subt_result . "<br />";
            
        ?>
    </body>

</html>