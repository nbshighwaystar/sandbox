<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Type Juggling and Casting</title>
    </head>
    <body>
        Type Juggling <br />
        <?php   // settype($var, "integer") or
                // (integer)$var

                /*
                string
                int, integer
                float
                array
                bool, boolean
                */
            $count = "2";
        ?>
        Type:   <?php echo gettype($count);?><br />
                <?php $count += 3;?>
        Type:   <?php echo gettype($count);?><br />

        <?php $cats = "I have " . $count . " cats."; ?>
        Cats: <?php echo gettype($cats); ?><br />
        <br />

        Type Casting <br />
        <?php echo gettype($count); ?><br />
        <?php settype($count,"integer"); ?>
        count: <?php echo gettype($count); ?><br />

        <?php $count2 = (string) $count; ?>
        count: <?php echo gettype($count); ?><br />
        count2: <?php echo gettype($count2); ?><br />
        <br />
    </body>

</html>