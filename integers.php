<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Integers</title>
    </head>
    <body>
        <?php
        $var1 = 3;
        $var2 = 4;
        ?>
        Basic Math: <?php echo ((1 + 2 + $var1) * $var2) / 2 - 5; ?> <br />
        <br />
        Absolute value:     <?php echo abs(0 - 300); ?> <br />
        Exponential:        <?php echo pow(2,8); ?> <br />
        Square root:       <?php echo sqrt(100); ?> <br />
        Modulo:             <?php echo fmod(20,7); ?> <br />
        Random:             <?php echo rand(); ?> <br />
        Random (min,max):   <?php echo rand(1,10); ?> <br />
    </body>

</html>