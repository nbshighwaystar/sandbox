<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Loops: For</title>
    </head>
    <body>
        <?php // while loop example
        $count = 0;
        while ($count <= 10) {
            # code...
            echo $count . ", ";
            $count++;   
        }
        ?>
        <br />
        <?php
        for ($count=0; $count <= 10; $count++) { 
            # code...
            echo $count . ", ";
        }
        ?>
        <br />

        <?php
            for ($count=1; $count < 20 ; $count++) { 
                # code...
                if ($count % 2 == 0) {
                    # code...
                    echo "{$count} is even.<br />";
                }else {
                    echo "{$count} is odd.<br />";
                }
            }
        ?>
    </body>

</html>