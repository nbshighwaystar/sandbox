<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Arrays</title>
    </head>
    <body>
        <?php
            $numbers = array(4,8,16,15,23,42);
            echo $numbers[1];
        ?>

        <?php $mixed = array(6, "fox", "doc", array("x","y","z")); ?>
        <?php echo $mixed[2]; ?><br />
        <?php echo $mixed[3][1]; ?><br />
        <pre>
            <?php   echo print_r($mixed); ?>
        </pre>
    </body>

</html>