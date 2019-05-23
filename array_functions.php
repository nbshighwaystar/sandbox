<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Array Functions</title>
    </head>
    <body>
        <?php
            $numbers = array(8,23,15,42,16,4);
        ?>
        Count:      <?php echo count($numbers); ?><br />
        Max Value:  <?php echo max($numbers); ?><br />
        Min Value:  <?php echo min($numbers); ?><br />
        <br />
<pre>
        Sort:           <?php sort($numbers); print_r($numbers); ?><br />
        Reverse Sort:   <?php rsort($numbers); print_r($numbers); ?><br />
        <br />
</pre>       
        Implode: <?php echo $num_string = implode(" * ", $numbers); ?><br />
        Explode: <?php print_r(explode(" * ", $num_string)); ?><br />
        <br />

        15 in array?: <?php echo in_array(15, $numbers);// return T/F ?><br />
        19 in array?: <?php echo in_array(19,$numbers); // return T/F ?><br />
        <br />
        <a href="http://php.net/manual/en/ref.array.php" target="\_blank">Array Reference</a>
        
    </body>

</html>