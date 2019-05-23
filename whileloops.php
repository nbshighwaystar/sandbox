<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Loops: While</title>
    </head>
    <body>
        <?php
            $count = 0;
            while ($count <= 10) {
                # code...
                if ($count == 5) {
                    # code...
                    echo "FIVE ";
                }else {
                    echo $count . ", ";
                }
               # echo $count . ", ";
                $count++;
            }
        ?>
    </body>

</html>