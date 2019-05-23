<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Associaive Array</title>
    </head>
    <body>
        <?php
         /* Compare
                Basic Arrays : when orders is important
                
                Associative Arrays : when having a reference label is most important
         */
        $assoc = array("first_name" =>"Kevin", "last_name" => "Skoglund"); 
        ?>
        <?php
            echo $assoc["first_name"]; 
        ?><br />
        <?php
            echo $assoc["first_name"] . " " . $assoc["last_name"];
        ?><br />  
        
        <?php
            $assoc["first_name"] ="Larry";
            echo $assoc["first_name"] . " " . $assoc["last_name"];
        ?><br />
        
    </body>

</html>