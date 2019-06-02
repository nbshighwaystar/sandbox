<?php
    function redirect_to($new_location){

        header("Location: .$new_location");
        exit;
    }
redirect_to("\widget_corp\public\manage_content.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Redirect</title> 
    </head>
    <body>
    </body>
</html>>
