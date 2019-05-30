<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Functions: Return Values</title>
    </head>
    <body>

        <?php // chinese zodiac as a function

            function chinese_zodiac($year)      
            {
                switch (($year - 4) % 12) 
                {
                    case  0 : return 'Rat';
                    case  1 : return 'Ox';
                    case  2 : return 'Tiger';
                    case  3 : return 'Rabbit';
                    case  4 : return 'Dragon';
                    case  5 : return 'Snake';
                    case  6 : return 'Horse';
                    case  7 : return 'Goat';
                    case  8 : return 'Monkey';
                    case  9 : return 'Rooster';
                    case 10 : return 'Dog';
                    case 11 : return 'Pig';
                       
                }
            }
            $zodiac = chinese_zodiac(2020);
            echo "2020 is the year of the {$zodiac}.<br />";
            $zodiac = chinese_zodiac(2019);
            echo "2019 is the year of the " . chinese_zodiac(2019) . " <br / >";
            ?>

            <?php
                function add($value1, $value2)
                {
                   $sum = $value1 + $value2;
                    return $sum;
                }

                $result1 = add(2, 2);
                echo $result1;
                echo "<br />";
                $result2 = add(5,$result1);
                echo $result2;
            ?>
            <br />

            <?php
                function better_hello($greeting, $target, $punct){
                    return $greeting . " " . $target . $punct . "<br />";
                }
                
                echo better_hello("Hello", "John Doe", "!");
            ?>
    </body>

</html>