<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Loops: Foreach</title>
    </head>
    <body>
        <?php
            $ages = array(4,8,15,16,23,42);

            foreach ($ages as $age) {
                # code...
                echo "Age: {$age}<br />";
            }            
            ?>
            <br />
            <?php
                $person = array(
                    "first_name" => "Neil" , 
                    "last_name" => "Sambo" , 
                    "address" => "Mamatid", 
                    "city" => "Cabuyao", 
                    "state" => "Laguna", 
                    "zip_code" => "4025");
                foreach ($person as $key => $value) {
                    # code...
                    $attr_nice = ucwords(str_replace("_"," ",$key));
                    echo "{$attr_nice}: {$value}<br />";
                }
            ?>
    </body>

</html>