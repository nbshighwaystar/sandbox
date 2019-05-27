<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <title>Form Processing</title>
    </head>
    <body>
        <pre>
            <?php
            print_r($_POST);
            ?>
        </pre>
        <?php
            if (isset($_POST['submit'])){
                echo "Form submitted <br />";

                    // set default value
                if(isset($_POST['username'])){

                    $username = $_POST['username'];
                }else{
                    $username = "";
                }
                if (isset($_POST['password'])){

                    $password = $_POST['password'];
                }else{
                    $password = "";
                }
                // set default value using ternary operator
                //boolean_test ? value_if_true : value_if_false
                $username = isset(($_POST['username'])) ? $username = $_POST['username'] : $username = "";
                $password = isset(($_POST['password'])) ? $password = $_POST['password'] : $password = "";
                
            }else {
                $username = "";
                $password = "";
            }
            ?>
            <?php echo $username . " " . $password;?>
    </body>

</html>